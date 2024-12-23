<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasBelajar extends Model
{
    use HasFactory;

    // Nama tabel, jika tidak sama dengan nama model
    protected $table = 'kenaikan_pangkat_tugas_belajar';

    // Kolom yang dapat diisi
    protected $fillable = [
        'karyawan_id',
        'sk_kenaikan_pangkat_terakhir',
        'surat_tugas_belajar',
        'penilaian_kinerja',
        'ijazah_terakhir',
        'transkrip_nilai',
        'sk_pemberhentian_jabatan',
        'tanggal_upload',
        'golongan',          
        'pangkat',  
        'kategori',           
        'tahun_pengajuan',   
    ];

    /**
     * Relasi ke model Karyawan (satu ke satu).
     * TugasBelajar dimiliki oleh satu Karyawan.
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
