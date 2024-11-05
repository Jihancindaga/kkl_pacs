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
            $table->date('tanggal_upload_sk_kenaikan_pangkat_terakhir')->nullable();
            $table->date('tanggal_upload_sk_jabatan_terakhir')->nullable();
            $table->date('tanggal_upload_ijazah_terakhir')->nullable();
            $table->date('tanggal_upload_transkrip_nilai')->nullable();
            $table->date('tanggal_upload_surat_akreditasi')->nullable();
            $table->date('tanggal_upload_surat_ijin_belajar')->nullable();
            $table->date('tanggal_upload_stl_ujian_kenaikan')->nullable();
            $table->date('tanggal_upload_penilaian_kinerja')->nullable();
            $table->date('tanggal_upload_surat_uraian_tugas')->nullable();
            $table->date('tanggal_upload_rekomendasi_kepala_instansi')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_penyesuaian_ijazah');
    }
}
