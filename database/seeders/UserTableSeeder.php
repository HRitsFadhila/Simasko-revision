<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat beberapa pengguna acak
        User::factory(5)->create();

        // Membuat pengguna administrator
        $admin = User::first();
        $admin->name = 'Administrator';
        $admin->username = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->id_role = 1;
        $admin->save();

        // Membuat pengguna karyawan
        $karyawan = User::factory()->create([
            'name' => 'Karyawan',
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'id_role' => 2,
        ]);
    }
}
