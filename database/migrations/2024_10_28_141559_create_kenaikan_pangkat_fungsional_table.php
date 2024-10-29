<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKenaikanPangkatFungsionalTable extends Migration
{
    public function up()
    {
        Schema::create('kenaikan_pangkat_fungsional', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->boolean('sk_cpns')->nullable();
            $table->boolean('sk_pns')->nullable();
            $table->boolean('sk_ploting_terakhir')->nullable();
            $table->boolean('sk_pengangkatan_jabatan_fungsional')->nullable();
            $table->boolean('berita_acara_pelantikan')->nullable();
            $table->boolean('penilaian_kinerja')->default(false);
            $table->boolean('pak')->nullable();
            $table->boolean('pak_integrasi')->nullable();
            $table->boolean('sk_pengangkatan_pertama_fungsional')->nullable();
            $table->boolean('sk_kenaikan_jabatan_fungsional')->nullable();
            $table->boolean('rekomendasi_kepala_instansi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_fungsional');
    }
}
