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
        'bagian',
        'no_telp',
    ];
    // Di Model Karyawan.php
    public function tugasBelajar()
    {
        return $this->hasMany(TugasBelajar::class, 'karyawan_id');
    }

    public function kenaikanPangkatKpo()
    {
        return $this->hasMany(KenaikanPangkatKpo::class, 'karyawan_id');
    }

    public function pilihanStruktural()
    {
        return $this->hasMany(PilihanStruktural::class, 'karyawan_id');
    }

    public function penyesuaianIjazah()
    {
        return $this->hasMany(PenyesuaianIjazah::class, 'karyawan_id');
    }

    public function fungsional()
    {
        return $this->hasMany(Fungsional::class, 'karyawan_id');
    }

}
