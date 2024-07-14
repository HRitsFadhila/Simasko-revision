<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'id_daftar_barang',
        'tanggal',
        'jumlah',
    ];

    // Relasi dengan model DaftarBarang
    public function daftarBarang()
    {
        return $this->belongsTo(DaftarBarang::class, 'id_daftar_barang');
    }
}
