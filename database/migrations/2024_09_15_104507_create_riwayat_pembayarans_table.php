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
            $table->unsignedBigInteger('id_vehicles'); // Kolom untuk menyimpan plat kendaraan
            $table->decimal('total_bayar', 10, 2); // Kolom untuk jumlah pembayaran
            $table->string('bukti_pembayaran')->nullable(); // Kolom untuk menyimpan bukti pembayaran
            $table->timestamps();

            // Foreign key
            $table->foreign('id_vehicles')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_pembayarans');
    }
}
