<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan', 255);
            $table->string('no_telepon', 255);
            $table->string('alamat', 255);
            $table->string('gaji');
            $table->string('foto')->nullable(); // Kolom foto, dapat kosong (nullable)
            $table->integer('umur')->nullable(); // Kolom umur, dapat kosong (nullable)
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable(); // Kolom jenis kelamin, dapat kosong (nullable)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
