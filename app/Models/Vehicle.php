<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $primaryKey = 'id'; // Menetapkan primary key
    // public $incrementing = false; // Karena primary key adalah string, bukan integer
    protected $keyType = 'string'; // Tipe data primary key adalah string

    protected $fillable = [
        'kode_kendaraan', 'plat', 'pengguna', 'jenis_kendaraan', 'waktu_pajak', 'ganti_plat', 
        'usia_kendaraan', 'cc', 'nomor_telepon'
    ];
    // Relasi dengan model RiwayatPembayaran
    public function riwayatPembayaran()
    {
        return $this->hasMany(RiwayatPembayaran::class, 'id_vehicles');
    }
}
