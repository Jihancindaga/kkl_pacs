<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function create()
    {
        // Ambil semua data kendaraan
        $vehicles = Vehicle::all();
        return view('form_data', compact('vehicles'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'plat' => 'required|string|unique:vehicles',
            'pengguna' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'merk_kendaraan' => 'required|string|max:255',
            'waktu_pajak' => 'required|date',
            'ganti_plat' => 'nullable|date',
            'usia_kendaraan' => 'required|integer',
            'cc' => 'required|integer',
            'nomor_telepon' => 'nullable|string'
        ]);
        // Tentukan prefix kode kendaraan berdasarkan jenis kendaraan
        $prefix = ($request->jenis_kendaraan == 'Motor') ? 'mtr-' : 'mbl-';

        // Hitung jumlah kendaraan dari jenis yang sama untuk menentukan nomor urut
        $lastVehicle = Vehicle::where('jenis_kendaraan', $request->jenis_kendaraan)
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $lastVehicle ? ((int)str_replace($prefix, '', $lastVehicle->kode_kendaraan) + 1) : 1;

        // Buat kode kendaraan dengan format: prefix + nomor urut
        $kodeKendaraan = $prefix . $nextNumber;

        // Simpan data kendaraan dengan kode_kendaraan
        $vehicle = Vehicle::create([
            'plat' => $request->plat,
            'pengguna' => $request->pengguna,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'merk_kendaraan' => $request->merk_kendaraan,
            'waktu_pajak' => $request->waktu_pajak,
            'ganti_plat' => $request->ganti_plat,
            'usia_kendaraan' => $request->usia_kendaraan,
            'cc' => $request->cc,
            'nomor_telepon' => $request->nomor_telepon,
            'kode_kendaraan' => $kodeKendaraan // Tambahkan kode kendaraan sebelum penyimpanan
        ]);

        // Redirect ke halaman daftar kendaraan dengan pesan sukses
        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }
}
