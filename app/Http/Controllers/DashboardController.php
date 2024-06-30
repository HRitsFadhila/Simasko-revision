<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user && $user->id_role === 1) {
            return view('dashboard');
        }

        // Tambahkan logika lainnya jika pengguna bukan admin
        return view('dashboard2');
    }
}
