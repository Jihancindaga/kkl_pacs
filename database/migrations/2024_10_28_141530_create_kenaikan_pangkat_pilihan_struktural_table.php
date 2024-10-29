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
            $table->boolean('sk_kenaikan_pangkat_terakhir')->default(false);
            $table->boolean('ijazah_terakhir')->default(false);
            $table->boolean('transkrip_nilai')->default(false);
            $table->boolean('sk_jabatan_spmt')->nullable();
            $table->boolean('berita_acara_pelantikan')->nullable();
            $table->boolean('surat_pernyataan_pelantikan')->nullable();
            $table->boolean('penilaian_kinerja')->default(false);
            $table->boolean('surat_gelar_bkn')->nullable();
            $table->boolean('sttpp_diklatpim_iii')->nullable();
            $table->boolean('rekomendasi_kepala_instansi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_pilihan_struktural');
    }
}
