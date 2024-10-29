<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKenaikanPangkatPenyesuaianIjazahTable extends Migration
{
    public function up()
    {
        Schema::create('kenaikan_pangkat_penyesuaian_ijazah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->boolean('sk_kenaikan_pangkat_terakhir')->default(false);
            $table->boolean('sk_jabatan_terakhir')->nullable();
            $table->boolean('ijazah_terakhir')->default(false);
            $table->boolean('transkrip_nilai')->default(false);
            $table->boolean('surat_akreditasi')->nullable();
            $table->boolean('surat_ijin_belajar')->nullable();
            $table->boolean('stl_ujian_kenaikan')->nullable();
            $table->boolean('penilaian_kinerja')->default(false);
            $table->boolean('surat_uraian_tugas')->nullable();
            $table->boolean('rekomendasi_kepala_instansi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_penyesuaian_ijazah');
    }
}
