<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::latest()->get();
        return view('pengguna.penggunaindex', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('pengguna.tambahpengguna', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'level' => 'required|exists:roles,id',
        ]);

        // Logika penyimpanan user baru
        User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_role' => $request->level,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'User berhasil ditambahkan.')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('pengguna.edituser', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Fetch the user to be updated
         $user = User::findOrFail($id);

         // Validate the incoming request data
         $request->validate([
             'nama' => 'required|string|max:255',
             'username' => 'required|string|max:255|unique:users,username,' . $user->id,
             'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
             'level' => 'required|exists:roles,id',
             'password' => 'nullable|string|min:8|confirmed',
         ]);
 
         // Update the user's data
         $user->name = $request->input('nama');
         $user->username = $request->input('username');
         $user->email = $request->input('email');
         $user->id_role = $request->input('level');
 
         // Check if the password field is filled, then update the password
         if ($request->filled('password')) {
             $user->password = Hash::make($request->input('password'));
         }
 
         // Save the updated user
         $user->save();
 
         // Redirect back with a success message
         return redirect()->route('pengguna.index')->with('success', 'User berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $user = User::findOrFail($id);
    
    $user->delete();

    return redirect()->route('pengguna.index')->with('success', 'User berhasil dihapus!');
    }
}
