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
        // Validasi dan simpan data
        $request->validate([
            'pengguna' => 'required|string|max:255',
            'plat' => 'required|string|max:10',
            'jenis_kendaraan' => 'required|string|max:255',
            'waktu_pajak' => 'required|string|max:255',
            'ganti_plat' => 'nullable|string|max:255',
            'usia_kendaraan' => 'required|integer',
            'cc' => 'required|string|max:10',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        // Simpan data kendaraan
        Vehicle::create($request->all());

        return redirect()->route('form_data.create')->with('success', 'Data berhasil disimpan!');
    }
}
