<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // Menampilkan semua kendaraan
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pajak', compact('vehicles')); // Mengarahkan ke view
    }

    // Menampilkan form untuk menambah kendaraan
    public function create()
    {
        return view('vehicles.create');
    }

    // Menyimpan kendaraan baru
    public function store(Request $request)
    {
        $request->validate([
            'plat' => 'required|string|unique:vehicles',
            'pengguna' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'waktu_pajak' => 'required|string',
            'ganti_plat' => 'required|string',
            'usia_kendaraan' => 'required|string',
            'cc' => 'required|integer',
            'nomor_telepon' => 'nullable|string'
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kendaraan
    public function edit($plat)
    {
        $vehicle = Vehicle::findOrFail($plat);
        return view('vehicles.edit', compact('vehicle'));
    }

    // Mengupdate kendaraan
   public function update(Request $request, $plat)
{
    // Validasi input termasuk file bukti pembayaran dan checkbox sudah bayar
    $request->validate([
        'pengguna' => 'required|string',
        'plat' => 'required|string|unique:vehicles,plat,' . $plat . ',plat',
        'jenis_kendaraan' => 'required|string',
        'waktu_pajak' => 'required|date',
        'ganti_plat' => 'required|date',
        'usia_kendaraan' => 'required|integer',
        'cc' => 'required|integer',
        'nomor_telepon' => 'nullable|string',
        'bukti_pembayaran' => 'required|file|mimes:jpg,png,pdf|max:2048', // Validasi bukti pembayaran
        'sudah_bayar' => 'required|boolean', // Validasi konfirmasi sudah bayar
    ]);

    $vehicle = Vehicle::where('plat', $plat)->firstOrFail();

    // Simpan bukti pembayaran jika file diunggah
    if ($request->hasFile('bukti_pembayaran')) {
        $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $vehicle->bukti_pembayaran = $buktiPembayaranPath;
    }

    // Update semua data kecuali file upload
    $vehicle->update($request->except('bukti_pembayaran'));

    return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil diperbarui.');
}


    // Menghapus kendaraan
    public function destroy($plat)
    {
        $vehicle = Vehicle::findOrFail($plat);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
