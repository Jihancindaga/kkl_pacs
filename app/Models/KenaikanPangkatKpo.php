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
        'tanggal_upload',
        'golongan',
        'pangkat',
        'tahun_pengajuan',   
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
