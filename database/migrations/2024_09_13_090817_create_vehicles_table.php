<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('No'); // Kolom auto-increment
            $table->string('plat')->unique(); // Kolom plat sebagai unique key
            $table->string('pengguna');
            $table->string('jenis_kendaraan');
            $table->date('waktu_pajak');
            $table->string('ganti_plat');
            $table->string('usia_kendaraan');
            $table->integer('cc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
