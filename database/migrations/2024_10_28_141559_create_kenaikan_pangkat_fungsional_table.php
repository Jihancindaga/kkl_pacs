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
            $table->string('golongan');
            $table->string('pangkat');
            $table->year('tahun_pengajuan');
            $table->string('sk_cpns')->nullable();
            $table->string('sk_pns')->nullable();
            $table->string('sk_ploting_terakhir')->nullable();
            $table->string('sk_pengangkatan_jabatan_fungsional')->nullable();
            $table->string('sk_kenaikan_pangkat_terakhir')->nullable();
            $table->string('ijazah_terakhir')->nullable(); // Memperbaiki kolom ijazah
            $table->string('transkrip_nilai')->nullable(); // Memperbaiki kolom transkip_nilai
            $table->string('sk_pmk')->nullable();
            $table->string('kategori')->nullable(); 
            $table->string('penilaian_kinerja')->nullable(); // Mengganti default(false) menjadi nullable
            $table->string('sertifikat_uji_kompetensi')->nullable();
            $table->string('pak')->nullable();
            $table->string('pak_integrasi')->nullable();
            $table->string('sk_pengangkatan_pertama_fungsional')->nullable();
            $table->string('sk_kenaikan_jabatan_fungsional')->nullable();
            $table->string('rekomendasi_kepala_instansi')->nullable();

            // Tambahkan kolom untuk tanggal upload
            $table->date('tanggal_upload')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_fungsional');
    }
}
