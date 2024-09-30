<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDeletionsTable extends Migration
{
    public function up()
{
    Schema::create('vehicle_deletions', function (Blueprint $table) {
        $table->id();
        $table->string('kode_kendaraan'); // Pastikan ini sesuai dengan kolom di tabel vehicles
        $table->text('alasan');
        $table->date('tanggal_hapus');
        $table->softDeletes();
        $table->timestamps();

        // Menambahkan foreign key jika perlu
        $table->foreign('kode_kendaraan')->references('kode_kendaraan')->on('vehicles')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('vehicle_deletions');
    }
}
