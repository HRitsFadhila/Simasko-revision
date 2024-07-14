<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriBarangController,
    KategoriServisController,
    PenggunaController,
    SupplierController,
    DaftarBarangController,
    BarangMasukController,
    BarangKeluarController
};
use App\Models\DaftarBarang;
use App\Models\KategoriServis;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect('/login');
});

Route::group([
    'middleware' => ['auth', 'role:admin,karyawan']
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::group([
        'middleware' => 'role:admin'
    ], function () {
        Route::resource('/kservis', KategoriServisController::class);
        Route::resource('/kbarang', KategoriBarangController::class);
        Route::resource('/pengguna', PenggunaController::class);
        Route::resource('/supplier', SupplierController::class);
        Route::resource('/dbarang', DaftarBarangController::class);
        Route::resource('/bmasuk', BarangMasukController::class);
        Route::resource('/bkeluar', BarangKeluarController::class);


    });

    Route::group([
        'middleware' => 'role:karyawan'
    ], function () {
        //
    });
});
