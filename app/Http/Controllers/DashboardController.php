<?php

namespace App\Http\Controllers;

use App\Models\DaftarBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total semua barang
        $totalJumlahSemuaBarang = DaftarBarang::sum('jumlah');
        $user = auth()->user();
        
        if ($user && $user->id_role === 1) {
            $jumlahSupplier = Supplier::count(); // Menghitung jumlah supplier
            return view('dashboard', compact('jumlahSupplier', 'totalJumlahSemuaBarang'));
        }

        // Tambahkan logika lainnya jika pengguna bukan admin
        $jumlahSupplier = Supplier::count();
        return view('dashboard2', compact('jumlahSupplier'));

        
    }
}
