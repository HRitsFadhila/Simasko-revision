<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDeleteBarangMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createTriggerDelete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dropTriggerDelete();
    }

    /**
     * Buat trigger untuk mengupdate jumlah barang di tabel daftarbarang saat DELETE barang_masuk
     *
     * @return void
     */
    private function createTriggerDelete()
    {
        // SQL untuk trigger DELETE
        $sql = '
            CREATE TRIGGER trg_delete_barang_masuk AFTER DELETE ON barang_masuk
            FOR EACH ROW
            BEGIN
                DECLARE jumlah_sekarang INT;

                SELECT jumlah INTO jumlah_sekarang FROM daftarbarang WHERE id = OLD.id_daftar_barang;

                IF jumlah_sekarang IS NOT NULL THEN
                    UPDATE daftarbarang SET jumlah = jumlah_sekarang - OLD.jumlah WHERE id = OLD.id_daftar_barang;
                END IF;
            END
        ';

        DB::unprepared($sql);
    }

    /**
     * Hapus trigger DELETE setelah menjalankan migrasi down
     *
     * @return void
     */
    private function dropTriggerDelete()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_delete_barang_masuk');
    }
}

