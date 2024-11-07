<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleDeletion;
use Illuminate\Http\Request;

class VehicleDeletionController extends Controller
{
    // Menampilkan form penghapusan
    public function create()
    {
        $vehicles = Vehicle::all(); // Ambil semua kendaraan
        return view('hapus-kendaraan', compact('vehicles'));
    }

    // Menyimpan penghapusan kendaraan
   // Menyimpan penghapusan kendaraan
public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_kendaraan' => 'required|exists:vehicles,kode_kendaraan',
        'alasan' => 'required|string|max:255',
    ]);

    // Cek apakah kendaraan dengan kode_kendaraan sudah ada
    $vehicle = Vehicle::where('kode_kendaraan', $request->input('kode_kendaraan'))->first();

    if ($vehicle) {
        // Hapus data di vehicle_deletions terlebih dahulu
        VehicleDeletion::where('kode_kendaraan', $vehicle->kode_kendaraan)->delete();

        // Lakukan soft delete kendaraan
        $vehicle->deleted_at = now();
        $vehicle->save();

        // Simpan data penghapusan kendaraan
        $vehicleDeletion = new VehicleDeletion();
        $vehicleDeletion->kode_kendaraan = $vehicle->kode_kendaraan;
        $vehicleDeletion->alasan = $request->input('alasan');
        $vehicleDeletion->tanggal_hapus = now();
        $vehicleDeletion->save();
    }

    return redirect()->route('daftar.hapus.kendaraan')->with('success', 'Kendaraan berhasil dihapus.');
}


    // Menampilkan daftar kendaraan yang dihapus
    public function index()
    {
        // Mengambil semua data penghapusan
        $vehicles = VehicleDeletion::withTrashed()->with('vehicle')->get();
        return view('daftar-hapus-kendaraan', compact('vehicles'));
    }
}
