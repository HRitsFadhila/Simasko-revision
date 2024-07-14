<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerBarangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
            CREATE TRIGGER trg_barang_keluar_delete AFTER DELETE ON barang_keluar
            FOR EACH ROW
            BEGIN
                DECLARE jumlah_sekarang INT;

                -- Ambil jumlah barang sekarang
                SELECT jumlah INTO jumlah_sekarang FROM daftarbarang WHERE id = OLD.id_daftar_barang;

                -- Update jumlah barang di daftarbarang setelah penghapusan data barang keluar
                UPDATE daftarbarang SET jumlah = jumlah + OLD.jumlah WHERE id = OLD.id_daftar_barang;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_barang_keluar_delete');
    }
}
