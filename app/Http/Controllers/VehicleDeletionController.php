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
            // 'tanggal_hapus' => 'required|date',
        ]);

        // Simpan data penghapusan
        $vehicleDeletion = new VehicleDeletion();
        $vehicleDeletion->kode_kendaraan = $request->input('kode_kendaraan');
        $vehicleDeletion->alasan = $request->input('alasan');
        $vehicleDeletion->tanggal_hapus = now();
        $vehicleDeletion->save();

        // Menghapus kendaraan dari tabel vehicles menggunakan soft deletes
        $vehicle = Vehicle::where('kode_kendaraan', $request->input('kode_kendaraan'))->first();
        if ($vehicle) {
            $vehicle->deleted_at = now(); // Mengisi deleted_at secara manual
            $vehicle->save();
        }

        return redirect()->route('daftar.hapus.kendaraan')->with('success', 'Kendaraan berhasil dihapus dan dicatat.');
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
