<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_vehicles',
        'tanggal_bayar',
        'total_bayar',
        'bukti_pembayaran',
        'konfirmasi_pembayaran',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicles');
    }
}
