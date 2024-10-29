<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKaryawanNonaktif extends Model
{
    use HasFactory;

    protected $table = 'riwayat_karyawan_nonaktif';

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'alasan',
        'tanggal_penghapusan',
    ];
}