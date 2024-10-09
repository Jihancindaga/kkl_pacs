<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleDeletion extends Model
{
    use SoftDeletes;

    protected $table = 'vehicle_deletions';

    protected $fillable = [
        'kode_kendaraan',
        'alasan',
        'tanggal_hapus',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'kode_kendaraan', 'kode_kendaraan')->withTrashed();
    }
}
