<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // Metode untuk menampilkan semua kendaraan (tabel pajak)
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pajak', compact('vehicles')); // Mengarahkan ke view pajak
    }

    // Metode untuk menampilkan riwayat kendaraan (tabel riwayat)
    public function riwayat()
    {
        $vehicles = Vehicle::all();
        return view('riwayat', compact('vehicles')); // Mengarahkan ke view riwayat
    }

    // Metode untuk menampilkan detail riwayat kendaraan
    public function showDetail($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        // Ambil riwayat pembayaran kendaraan
        $riwayatPembayaran = $vehicle->riwayatPembayaran()->latest()->get();

        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran')); // Mengarahkan ke view riwayat_detail
    }

    // Metode untuk menampilkan form tambah kendaraan
    public function create()
    {
        return view('vehicles.create');
    }

    // Metode untuk menyimpan kendaraan baru
    public function store(Request $request)
    {
        $request->validate([
            'plat' => 'required|string|unique:vehicles',
            'pengguna' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'waktu_pajak' => 'required|date',
            'ganti_plat' => 'required|date',
            'usia_kendaraan' => 'required|integer',
            'cc' => 'required|integer',
            'nomor_telepon' => 'nullable|string'
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    // Metode untuk menampilkan form edit kendaraan
    public function edit($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        return view('vehicles.edit', compact('vehicle'));
    }

    // Metode untuk mengupdate kendaraan
    public function update(Request $request, $plat)
    {
        $request->validate([
            'pengguna' => 'required|string',
            'plat' => 'required|string|unique:vehicles,plat,' . $plat . ',plat',
            'jenis_kendaraan' => 'required|string',
            'waktu_pajak' => 'required|date',
            'ganti_plat' => 'required|date',
            'usia_kendaraan' => 'required|integer',
            'cc' => 'required|integer',
            'nomor_telepon' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'sudah_bayar' => 'nullable|boolean',
        ]);

        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();

        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $vehicle->bukti_pembayaran = $buktiPembayaranPath;
        }

        $vehicle->update($request->except('bukti_pembayaran'));

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    // Metode untuk menghapus kendaraan
    public function destroy($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus.');
    }

    // Metode untuk menampilkan detail riwayat kendaraan dengan pencarian
    public function showRiwayat(Request $request, $plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        
        // Ambil kata kunci pencarian dari request
        $search = $request->input('search');
        
        // Filter riwayat pembayaran berdasarkan pencarian
        $riwayatPembayaran = $vehicle->riwayatPembayaran()
            ->when($search, function ($query, $search) {
                return $query->where('waktu_pajak', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
    }
}
