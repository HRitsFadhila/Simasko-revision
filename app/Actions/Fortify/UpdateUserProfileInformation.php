<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        // Validate the input data
        $validated = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:25', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'path_image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'password' => ['nullable', 'string', 'min:8'],
        ])->validate();

        // Handle profile image upload and deletion of old image
        if (isset($input['path_image']) && request()->hasFile('path_image')) {
            // Delete old image if exists
            if ($user->path_image) {
                Storage::delete('public/' . $user->path_image);
            }

            // Upload new image
            $path = request()->file('path_image')->store('user', 'public');
            $input['path_image'] = $path;
        } else {
            unset($input['path_image']); // Don't update the path_image field if no new image is uploaded
        }

        // Encrypt password if it is set
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']); // Don't update the password field if it's not set
        }

        // Update user profile information
        $user->update($input);
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
