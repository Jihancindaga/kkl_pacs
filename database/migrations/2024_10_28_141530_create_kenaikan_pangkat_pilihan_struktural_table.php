<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKenaikanPangkatPilihanStrukturalTable extends Migration
{
    public function up()
    {
        Schema::create('kenaikan_pangkat_pilihan_struktural', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->string('sk_kenaikan_pangkat_terakhir')->nullable();
            $table->string('ijazah_terakhir')->nullable();
            $table->string('transkrip_nilai')->nullable();
            $table->string('sk_jabatan')->nullable();
            $table->string('spmt')->nullable();
            $table->string('berita_acara_pelantikan')->nullable();
            $table->string('surat_pernyataan_pelantikan')->nullable();
            $table->string('penilaian_kinerja')->nullable();
            $table->string('surat_gelar_bkn')->nullable();
            $table->string('sttpp_diklatpim_iii')->nullable();
            $table->string('rekomendasi_kepala_instansi')->nullable();

            // Tambahkan kolom untuk tanggal upload
            $table->date('tanggal_upload_sk_kenaikan_pangkat_terakhir')->nullable();
            $table->date('tanggal_upload_ijazah_terakhir')->nullable();
            $table->date('tanggal_upload_transkrip_nilai')->nullable();
            $table->date('tanggal_upload_sk_jabatan')->nullable();
            $table->date('tanggal_upload_spmt')->nullable();
            $table->date('tanggal_upload_berita_acara_pelantikan')->nullable();
            $table->date('tanggal_upload_surat_pernyataan_pelantikan')->nullable();
            $table->date('tanggal_upload_penilaian_kinerja')->nullable();
            $table->date('tanggal_upload_surat_gelar_bkn')->nullable();
            $table->date('tanggal_upload_sttpp_diklatpim_iii')->nullable();
            $table->date('tanggal_upload_rekomendasi_kepala_instansi')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_pilihan_struktural');
    }
}