<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'karyawans';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nip',
        'nama',
        'tanggal_kenaikan_gaji',
        'tanggal_kenaikan_pangkat',
        'golongan',
        'pangkat',
        'jabatan',
        'no_telp',
    ];
}
