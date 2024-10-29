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
            'berita_acara_pelantikan',
            'penilaian_kinerja',
            'pak',
            'pak_integrasi',
            'sk_pengangkatan_pertama_fungsional',
            'sk_kenaikan_jabatan_fungsional',
            'rekomendasi_kepala_instansi',
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
