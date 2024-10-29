<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanStruktural extends Model
{
    use HasFactory;

    // Nama tabel, jika tidak sama dengan nama model
    protected $table = 'kenaikan_pangkat_pilihan_struktural';

    // Kolom yang dapat diisi
    protected $fillable = [
        'karyawan_id',
        'sk_kenaikan_pangkat_terakhir',
        'ijazah_terakhir',
        'transkrip_nilai',
        'sk_jabatan_spmt',
        'berita_acara_pelantikan',
        'surat_pernyataan_pelantikan',
        'penilaian_kinerja',
        'surat_gelar_bkn',
        'sttpp_diklatpim_iii',
        'rekomendasi_kepala_instansi',
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