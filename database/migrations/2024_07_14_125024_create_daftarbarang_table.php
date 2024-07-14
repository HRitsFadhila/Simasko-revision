<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftarbarang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori_barang');
            $table->unsignedBigInteger('id_supplier');
            $table->string('kd_barang')->unique();
            $table->string('nama');
            $table->string('satuan');
            $table->integer('jumlah')->nullable();;
            $table->bigInteger('harga_beli');
            $table->timestamps();
            
            $table->foreign('id_kategori_barang')->references('id')->on('kategoribarang')->onDelete('cascade');
            $table->foreign('id_supplier')->references('id')->on('supplier')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarbarang');
    }
};
