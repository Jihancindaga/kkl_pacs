<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomorTeleponToVehiclesTable extends Migration
{
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('nomor_telepon')->nullable(); // Menambahkan kolom nomor_telepon yang bisa kosong
        });
    }

    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('nomor_telepon'); // Menghapus kolom nomor_telepon jika migrasi dibatalkan
        });
    }
}
