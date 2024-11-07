<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KenaikanPangkatKpo extends Model
{
    use HasFactory;

    protected $table = 'kenaikan_pangkat_kpo';

    protected $fillable = [
        'karyawan_id',
        'sk_kenaikan_pangkat_terakhir',
        'sk_pmk',
        'sk_jabatan_pelaksana_terakhir',
        'penilaian_kinerja',
        'ijazah_terakhir',
        'transkrip_nilai',
        'surat_gelar_bkn',
        'stlud',
        'rekomendasi_kepala_instansi',
        'tanggal_upload_sk_kenaikan_pangkat_terakhir',
        'tanggal_upload_sk_pmk', 
        'tanggal_upload_sk_jabatan_pelaksana_terakhir', 
        'tanggal_upload_penilaian_kinerja',
        'tanggal_upload_ijazah_terakhir', 
        'tanggal_upload_transkrip_nilai',
        'tanggal_upload_surat_gelar_bkn', 
        'tanggal_upload_stlud',
        'tanggal_upload_rekomendasi_kepala_instansi', 
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
