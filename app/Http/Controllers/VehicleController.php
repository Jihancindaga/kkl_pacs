<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\RiwayatPembayaran;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    // Menampilkan semua kendaraan (tabel pajak)
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pajak', compact('vehicles'));
    }

    // Menampilkan riwayat kendaraan (tabel riwayat)
    public function riwayat()
    {
        $vehicles = Vehicle::all();
        return view('riwayat', compact('vehicles'));
    }

    // Menampilkan detail riwayat kendaraan
    public function showDetail($plat)
{
    $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
    $riwayatPembayaran = RiwayatPembayaran::where('plat', $plat)->latest()->get();

    return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
}

    // Menampilkan form tambah kendaraan
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
            'waktu_pajak' => 'required|date',
            'ganti_plat' => 'required|date',
            'usia_kendaraan' => 'required|integer',
            'cc' => 'required|integer',
            'nomor_telepon' => 'nullable|string'
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    // Menampilkan form edit kendaraan
    public function edit($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        return view('vehicles.edit', compact('vehicle'));
    }

    // Mengupdate kendaraan
    public function update(Request $request, $plat)
{
     // Log data request untuk debugging
     \Log::info('Request Data:', $request->all());
    $request->validate([
        'pengguna' => 'required|string',
        'jenis_kendaraan' => 'required|string',
        'waktu_pajak' => 'required|date',
        'ganti_plat' => 'required|date',
        'usia_kendaraan' => 'required|integer',
        'cc' => 'required|integer',
        'total_bayar' => 'required|integer',
        'bukti_pembayaran' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
    ]);

    $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
    
    $vehicle->pengguna = $request->input('pengguna');
    $vehicle->jenis_kendaraan = $request->input('jenis_kendaraan');
    $vehicle->waktu_pajak = $request->input('waktu_pajak');
    $vehicle->ganti_plat = $request->input('ganti_plat');
    $vehicle->usia_kendaraan = $request->input('usia_kendaraan');
    $vehicle->cc = $request->input('cc');
    $vehicle->total_bayar = $request->input('total_bayar');

    if ($request->hasFile('bukti_pembayaran')) {
        // Hapus file yang lama jika ada
        if ($vehicle->bukti_pembayaran) {
            Storage::delete('public/' . $vehicle->bukti_pembayaran);
        }
        $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $vehicle->bukti_pembayaran = $buktiPembayaranPath;
    }

    // Simpan perubahan data kendaraan
    $vehicle->save();

    // Simpan riwayat pembayaran jika total_bayar diisi
    if ($request->filled('total_bayar')) {
        RiwayatPembayaran::create([
            'plat' => $plat,
            'waktu_pajak' => $request->input('waktu_pajak'),
            'total_bayar' => $request->input('total_bayar'),
            'bukti_pembayaran' => isset($buktiPembayaranPath) ? $buktiPembayaranPath : $vehicle->bukti_pembayaran,
        ]);
    }

    // Ambil data riwayat pembayaran yang terupdate
    $riwayatPembayaran = RiwayatPembayaran::where('plat', $vehicle->plat)->latest()->get();

    return redirect()->route('vehicles.showDetail', $vehicle->plat)
                     ->with(compact('vehicle', 'riwayatPembayaran'))
                     ->with('success', 'Kendaraan berhasil diperbarui.');
}


    // Menghapus kendaraan
    public function destroy($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        // Hapus file bukti pembayaran jika ada
        if ($vehicle->bukti_pembayaran) {
            Storage::delete('public/' . $vehicle->bukti_pembayaran);
        }
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus.');
    }

    // Menampilkan detail riwayat kendaraan dengan pencarian
    public function showRiwayat(Request $request, $plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        
        $search = $request->input('search');
        
        $riwayatPembayaran = RiwayatPembayaran::where('plat', $vehicle->plat)
            ->when($search, function ($query, $search) {
                return $query->where('waktu_pajak', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
    }

    public function riwayatDetail($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        $riwayatPembayaran = Vehicle::where('plat', $plat)->get();
        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
    }
    
}
