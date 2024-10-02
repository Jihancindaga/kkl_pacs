<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kendaraan');
            $table->date('tanggal_bayar');
            $table->decimal('total_bayar', 10, 2);
            $table->string('bukti_pembayaran');
            $table->boolean('konfirmasi_pembayaran')->default(false);
            $table->timestamps();

            $table->foreign('kode_kendaraan')->references('kode_kendaraan')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembayarans');
    }
}
