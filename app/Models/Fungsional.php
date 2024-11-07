<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsional extends Model
{
    use HasFactory;

    protected $table = 'kenaikan_pangkat_fungsional';

    protected $fillable = [
            'karyawan_id',
            'sk_cpns',
            'sk_pns',
            'sk_ploting_terakhir',
            'sk_pengangkatan_jabatan_fungsional',
            'sk_kenaikan_pangkat_terakhir',
            'ijazah_terakhir',
            'transkrip_nilai',
            'sk_pmk',
            'penilaian_kinerja',
            'sertifikat_uji_kompetensi',
            'pak',
            'pak_integrasi',
            'sk_pengangkatan_pertama_fungsional',
            'sk_kenaikan_jabatan_fungsional',
            'rekomendasi_kepala_instansi',
            'tanggal_upload_sk_cpns',
            'tanggal_upload_sk_pns',
            'tanggal_upload_sk_ploting_terakhir',
            'tanggal_upload_sk_pengangkatan_jabatan_fungsional',
            'tanggal_upload_sk_kenaikan_pangkat_terakhir',
            'tanggal_upload_ijazah_terakhir',
            'tanggal_upload_transkrip_nilai',
            'tanggal_upload_sk_pmk',
            'tanggal_upload_penilaian_kinerja',
            'tanggal_upload_sertifikat_uji_kompetensi',
            'tanggal_upload_pak',
            'tanggal_upload_pak_integrasi',
            'tanggal_upload_sk_pengangkatan_pertama_fungsional',
            'tanggal_upload_sk_kenaikan_jabatan_fungsional',
            'tanggal_upload_rekomendasi_kepala_instansi',
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
