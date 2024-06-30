<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriServis extends Model
{
    use HasFactory;

    protected $table = 'kategoriservis';
    protected $fillable = ['nama_kategori'];
}
