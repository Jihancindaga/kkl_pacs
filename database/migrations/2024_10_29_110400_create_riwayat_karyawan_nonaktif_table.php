<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatKaryawanNonaktifTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_karyawan_nonaktif', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('jabatan');
            $table->text('alasan'); // Kolom 'alasan' untuk alasan penghapusan
            $table->date('tanggal_penghapusan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_karyawan_nonaktif');
    }
}