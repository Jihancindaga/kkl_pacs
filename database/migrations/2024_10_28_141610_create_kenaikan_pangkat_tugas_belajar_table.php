<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKenaikanPangkatTugasBelajarTable extends Migration
{
    public function up()
    {
        Schema::create('kenaikan_pangkat_tugas_belajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->string('sk_kenaikan_pangkat_terakhir')->nullable();
            $table->string('surat_tugas_belajar')->nullable();
            $table->string('penilaian_kinerja')->nullable();
            $table->string('ijazah_terakhir')->nullable();
            $table->string('transkrip_nilai')->nullable();
            $table->string('sk_pemberhentian_jabatan')->nullable();
            
            // Tambahkan kolom untuk tanggal upload
            $table->date('tanggal_upload')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_tugas_belajar');
    }
}
