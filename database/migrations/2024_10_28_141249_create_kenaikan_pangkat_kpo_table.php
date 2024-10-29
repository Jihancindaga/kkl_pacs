
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKenaikanPangkatKpoTable extends Migration
{
    public function up()
    {
        Schema::create('kenaikan_pangkat_kpo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->string('sk_kenaikan_pangkat_terakhir')->default(false);
            $table->string('sk_pmk')->nullable();
            $table->string('sk_jabatan_pelaksana_terakhir')->nullable();
            $table->string('penilaian_kinerja')->default(false);
            $table->string('ijazah_terakhir')->default(false);
            $table->string('transkrip_nilai')->default(false);
            $table->string('surat_gelar_bkn')->nullable();
            $table->string('stlud')->nullable();
            $table->string('rekomendasi_kepala_instansi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kenaikan_pangkat_kpo');
    }
}
