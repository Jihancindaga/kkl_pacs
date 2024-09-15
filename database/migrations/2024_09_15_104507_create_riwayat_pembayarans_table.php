<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('plat'); // Kolom untuk menyimpan plat kendaraan
            $table->decimal('total_bayar', 10, 2); // Kolom untuk jumlah pembayaran
            $table->string('bukti_pembayaran')->nullable(); // Kolom untuk menyimpan bukti pembayaran
            $table->timestamps();

            // Foreign key
            $table->foreign('plat')->references('plat')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_pembayarans');
    }
}
