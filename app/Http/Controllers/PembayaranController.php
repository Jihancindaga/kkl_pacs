<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\RiwayatPembayaran;
use Illuminate\Support\Facades\Storage;


class PembayaranController extends Controller
{
    /**
     * Tampilkan form pembayaran.
     */
    public function create($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('bayar', compact('vehicle'));
    }

    /**
     * Simpan data pembayaran ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_vehicles' => 'required|exists:vehicles,id',
            'tanggal_bayar' => 'required|date',
            'total_bayar' => 'required|numeric',
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'konfirmasi_pembayaran' => 'accepted',
        ]);

        // Upload bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // Simpan data ke riwayat_pembayarans
        RiwayatPembayaran::create([
            'id_vehicles' => $request->id_vehicles,
            'tanggal_bayar' => $request->tanggal_bayar,
            'total_bayar' => $request->total_bayar,
            'bukti_pembayaran' => $path,
            'konfirmasi_pembayaran' => $request->konfirmasi_pembayaran ? true : false,
        ]);

        return redirect()->route('riwayat.index')->with('success', 'Pembayaran berhasil dilakukan.');
    }

    /**
     * Tampilkan riwayat pembayaran.
     */
    public function index()
    {
        $riwayats = RiwayatPembayaran::with('vehicle')->latest()->get();
        return view('riwayat', compact('riwayats'));

        // Mengambil semua kendaraan
    $vehicles = Vehicle::all(); 

    // Mengirim data ke view
    return view('riwayat', compact('vehicles'));
    }

    public function show($id)
{
    $vehicle = Vehicle::with('riwayatPembayaran')->findOrFail($id);
    return view('riwayat_detail', compact('vehicle'));
}


}
