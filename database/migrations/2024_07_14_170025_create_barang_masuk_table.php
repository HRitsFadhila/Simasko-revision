<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_daftar_barang')->constrained('daftarbarang');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();
        });

        // Tambahkan trigger setelah membuat tabel
        $this->createTrigger();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus trigger sebelum menghapus tabel
        $this->dropTrigger();

        Schema::dropIfExists('barang_masuk');
    }

    /**
     * Buat trigger untuk mengupdate jumlah barang di tabel daftarbarang
     *
     * @return void
     */
    private function createTrigger()
    {
        // SQL untuk trigger
        $sql = '
            CREATE TRIGGER trg_barang_masuk AFTER INSERT ON barang_masuk
            FOR EACH ROW
            BEGIN
                DECLARE jumlah_sekarang INT;
                SELECT jumlah INTO jumlah_sekarang FROM daftarbarang WHERE id = NEW.id_daftar_barang;
                UPDATE daftarbarang SET jumlah = jumlah_sekarang + NEW.jumlah WHERE id = NEW.id_daftar_barang;
            END
        ';

        DB::unprepared($sql);
    }

    /**
     * Hapus trigger setelah menjalankan migrasi down
     *
     * @return void
     */
    private function dropTrigger()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_barang_masuk');
    }
}
