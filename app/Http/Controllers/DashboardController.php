<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user && $user->id_role === 1) {
            $jumlahSupplier = Supplier::count(); // Menghitung jumlah supplier
            return view('dashboard', compact('jumlahSupplier'));
        }

        // Tambahkan logika lainnya jika pengguna bukan admin
        $jumlahSupplier = Supplier::count();
        return view('dashboard2', compact('jumlahSupplier'));

        
    }
}
