<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyesuaianIjazah extends Model
{
    use HasFactory;

    protected $table = 'kenaikan_pangkat_penyesuaian_ijazah';

    protected $fillable = [
       'karyawan_id',
           'sk_kenaikan_pangkat_terakhir',
           'sk_jabatan_terakhir',
           'ijazah_terakhir',
            'transkrip_nilai',
            'surat_akreditasi',
            'surat_ijin_belajar',
            'stl_ujian_kenaikan',
            'penilaian_kinerja',
           'surat_uraian_tugas',
            'rekomendasi_kepala_instansi',
            'tanggal_upload_sk_kenaikan_pangkat_terakhir',
            'tanggal_upload_sk_jabatan_terakhir',
            'tanggal_upload_ijazah_terakhir',
            'tanggal_upload_transkrip_nilai',
            'tanggal_upload_surat_akreditasi',
            'tanggal_upload_surat_ijin_belajar',
            'tanggal_upload_stl_ujian_kenaikan',
            'tanggal_upload_penilaian_kinerja',
            'tanggal_upload_surat_uraian_tugas',
            'tanggal_upload_rekomendasi_kepala_instansi',
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
