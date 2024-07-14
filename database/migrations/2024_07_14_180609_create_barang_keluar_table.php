<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_daftar_barang')->constrained('daftarbarang');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();
        });

        // Tambahkan trigger setelah membuat tabel
        $this->createTrigger();
    }

    public function down()
    {
        // Hapus trigger sebelum menghapus tabel
        $this->dropTrigger();

        Schema::dropIfExists('barang_keluar');
    }

    private function createTrigger()
    {
        $sql = '
            CREATE TRIGGER trg_barang_keluar AFTER INSERT ON barang_keluar
            FOR EACH ROW
            BEGIN
                DECLARE jumlah_sekarang INT;
                SELECT jumlah INTO jumlah_sekarang FROM daftarbarang WHERE id = NEW.id_daftar_barang;
                UPDATE daftarbarang SET jumlah = jumlah - NEW.jumlah WHERE id = NEW.id_daftar_barang;
            END
        ';

        DB::unprepared($sql);
    }

    private function dropTrigger()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_barang_keluar');
    }
}
