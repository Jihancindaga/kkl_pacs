<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $primaryKey = 'plat'; // Menetapkan primary key
    public $incrementing = false; // Karena primary key adalah string, bukan integer
    protected $keyType = 'string'; // Tipe data primary key adalah string

    protected $fillable = [
        'plat', 'pengguna', 'jenis_kendaraan', 'waktu_pajak', 'ganti_plat', 
        'usia_kendaraan', 'cc', 'nomor_telepon'
    ];
}
