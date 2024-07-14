<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBarang extends Model
{
    use HasFactory;

    protected $table = 'daftarbarang';

    protected $fillable = [
        'id_kategori_barang',
        'id_supplier',
        'kd_barang',
        'nama',
        'satuan',
        'jumlah',
        'harga_beli',
    ];

    public function kategoribarang()
    {
    return $this->belongsTo(KategoriBarang::class, 'id_kategori_barang');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // Relasi dengan model BarangMasuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_daftar_barang');
    }
}
