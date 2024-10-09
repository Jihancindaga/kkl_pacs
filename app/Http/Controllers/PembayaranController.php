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
    public function store(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // Validasi input
        $request->validate([
            'id_vehicles' => 'required|integer',
            'kode_kendaraan' => 'required|string|max:255',
            'tanggal_bayar' => 'required|date',
            'total_bayar' => 'required|numeric',
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'confirm' => 'accepted',
        ]);

        // Upload bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // dd($request, $path);

        // Simpan data ke riwayat_pembayarans
        RiwayatPembayaran::create([
            'id_vehicles' => $request->id_vehicles,
            'kode_kendaraan' => $request->kode_kendaraan,
            'tanggal_bayar' => $request->tanggal_bayar,
            'total_bayar' => $request->total_bayar,
            'bukti_pembayaran' => $path,
            'konfirmasi_pembayaran' => $request->konfirmasi_pembayaran ? true : false,
        ]);

        return redirect()
            ->route('riwayat.show.detail', $vehicle->id)
            ->with('success', 'Pembayaran berhasil dilakukan.');
    }

    /**
     * Tampilkan riwayat pembayaran.
     */
    public function index()
    {
        // Mengambil riwayat pembayaran dan kendaraan terkait
        $riwayats = RiwayatPembayaran::with('vehicle')->latest()->get();
        $vehicles = Vehicle::all(); // Pastikan ini mengembalikan koleksi kendaraan
        return view('riwayat', compact('riwayats', 'vehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('riwayatPembayaran')->findOrFail($id);
        return view('riwayat_detail', compact('vehicle'));
    }
}
