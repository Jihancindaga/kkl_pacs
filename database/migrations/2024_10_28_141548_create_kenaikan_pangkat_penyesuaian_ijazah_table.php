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
            $table->string('golongan');
            $table->string('pangkat');
            $table->year('tahun_pengajuan');
            $table->string('sk_kenaikan_pangkat_terakhir')->nullable();
            $table->string('sk_jabatan_terakhir')->nullable();
            $table->string('ijazah_terakhir')->nullable();
            $table->string('transkrip_nilai')->nullable();
            $table->string('surat_akreditasi')->nullable();
            $table->string('surat_ijin_belajar')->nullable();
            $table->string('stl_ujian_kenaikan')->nullable();
            $table->string('penilaian_kinerja')->nullable();
            $table->string('surat_uraian_tugas')->nullable();
            $table->string('rekomendasi_kepala_instansi')->nullable();

            // Tambahkan kolom untuk tanggal upload
            $table->date('tanggal_upload')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_penyesuaian_ijazah');
    }
}
