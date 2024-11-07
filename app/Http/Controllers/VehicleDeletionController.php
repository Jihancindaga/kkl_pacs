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
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_kendaraan' => 'required|exists:vehicles,kode_kendaraan',
        'alasan' => 'required|string|max:255',
    ]);

    // Cek apakah kendaraan dengan kode_kendaraan sudah ada tapi soft deleted
    $vehicle = Vehicle::withTrashed()->where('kode_kendaraan', $request->input('kode_kendaraan'))->first();
    if ($vehicle && $vehicle->trashed()) {
        // Restore kendaraan yang sudah soft deleted
        $vehicle->restore();
    } else {
        // Jika tidak ada, simpan data penghapusan kendaraan
        $vehicleDeletion = new VehicleDeletion();
        $vehicleDeletion->kode_kendaraan = $request->input('kode_kendaraan');
        $vehicleDeletion->alasan = $request->input('alasan');
        $vehicleDeletion->tanggal_hapus = now();
        $vehicleDeletion->save();

        // Soft delete kendaraan dari tabel vehicles
        $vehicle = Vehicle::where('kode_kendaraan', $request->input('kode_kendaraan'))->first();
        if ($vehicle) {
            $vehicle->deleted_at = now();
            $vehicle->save();
        }
    }

    return redirect()->route('daftar.hapus.kendaraan')->with('success', 'Kendaraan berhasil dihapus atau dipulihkan jika sudah ada.');
}


    // Menampilkan daftar kendaraan yang dihapus
    public function index()
    {
        // Mengambil semua data penghapusan
        $vehicles = VehicleDeletion::withTrashed()->with('vehicle')->get();
        // dd($vehicles);
        return view('daftar-hapus-kendaraan', compact('vehicles'));
    }
}
