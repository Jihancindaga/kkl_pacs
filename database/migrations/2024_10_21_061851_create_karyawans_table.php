<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->date('tanggal_kenaikan_gaji');
            $table->date('tanggal_kenaikan_pangkat');
            $table->string('golongan');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('bagian');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
