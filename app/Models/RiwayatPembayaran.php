<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'plat',
        'total_bayar',
        'bukti_pembayaran',
    ];

    // Relasi ke model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'plat', 'plat'); // Relasi ke vehicles
    }
}
