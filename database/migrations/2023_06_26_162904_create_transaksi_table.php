<?php

use App\Models\Transaksi\Transaksi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_transaksi');
            $table->enum('jenis_transaksi', Transaksi::$JENIS_TRANSAKSI);
            $table->double('harga');
            $table->integer('jumlah');
            $table->foreignId('barang_id')->constrained('barang');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER pembelian AFTER INSERT ON transaksi
            FOR EACH ROW
            BEGIN
                IF NEW.jenis_transaksi = "pembelian" THEN
                    UPDATE barang SET stok = stok + NEW.jumlah WHERE id = NEW.barang_id;
                END IF;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER penjualan AFTER INSERT ON transaksi
            FOR EACH ROW
            BEGIN
                IF NEW.jenis_transaksi = "penjualan" THEN
                    UPDATE barang SET stok = stok - NEW.jumlah WHERE id = NEW.barang_id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS pembalian');

        DB::unprepared('DROP TRIGGER IF EXISTS penjualan');

        Schema::dropIfExists('transaksi');
    }
};
