<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
{
    Schema::create('vehicles', function (Blueprint $table) {
        $table->id(); // Kolom auto-increment
        $table->string('kode_kendaraan')->nullable()->unique();
        $table->string('jenis_kendaraan'); // Jenis kendaraan
        $table->string('plat')->unique(); // Kolom plat sebagai unique key
        $table->string('pengguna'); // Pengguna kendaraan
        $table->date('waktu_pajak'); // Waktu pajak
        $table->string('ganti_plat')->nullable(); // Ganti plat, bisa kosong
        $table->integer('usia_kendaraan'); // Usia kendaraan
        $table->integer('cc'); // Kapasitas mesin
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}


    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
