<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

    protected $fillable = [
        'id_daftar_barang', 'tanggal', 'jumlah'
    ];

    public function daftarBarang()
    {
        return $this->belongsTo(DaftarBarang::class, 'id_daftar_barang');
    }
}
