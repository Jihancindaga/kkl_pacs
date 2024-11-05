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
            $table->string('sk_cpns')->nullable();
            $table->string('sk_pns')->nullable();
            $table->string('sk_ploting_terakhir')->nullable();
            $table->string('sk_pengangkatan_jabatan_fungsional')->nullable();
            $table->string('sk_kenaikan_pangkat_terakhir')->nullable();
            $table->string('ijazah_terakhir')->nullable(); // Memperbaiki kolom ijazah
            $table->string('transkrip_nilai')->nullable(); // Memperbaiki kolom transkip_nilai
            $table->string('sk_pmk')->nullable();
            $table->string('penilaian_kinerja')->nullable(); // Mengganti default(false) menjadi nullable
            $table->string('sertifikat_uji_kompetensi')->nullable();
            $table->string('pak')->nullable();
            $table->string('pak_integrasi')->nullable();
            $table->string('sk_pengangkatan_pertama_fungsional')->nullable();
            $table->string('sk_kenaikan_jabatan_fungsional')->nullable();
            $table->string('rekomendasi_kepala_instansi')->nullable();

            // Tambahkan kolom untuk tanggal upload
            $table->date('tanggal_upload_sk_cpns')->nullable();
            $table->date('tanggal_upload_sk_pns')->nullable();
            $table->date('tanggal_upload_sk_ploting_terakhir')->nullable();
            $table->date('tanggal_upload_sk_pengangkatan_jabatan_fungsional')->nullable();
            $table->date('tanggal_upload_sk_kenaikan_pangkat_terakhir')->nullable();
            $table->date('tanggal_upload_ijazah_terakhir')->nullable();
            $table->date('tanggal_upload_transkrip_nilai')->nullable();
            $table->date('tanggal_upload_sk_pmk')->nullable();
            $table->date('tanggal_upload_penilaian_kinerja')->nullable();
            $table->date('tanggal_upload_sertifikat_uji_kompetensi')->nullable();
            $table->date('tanggal_upload_pak')->nullable();
            $table->date('tanggal_upload_pak_integrasi')->nullable();
            $table->date('tanggal_upload_sk_pengangkatan_pertama_fungsional')->nullable();
            $table->date('tanggal_upload_sk_kenaikan_jabatan_fungsional')->nullable();
            $table->date('tanggal_upload_rekomendasi_kepala_instansi')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_fungsional');
    }
}
