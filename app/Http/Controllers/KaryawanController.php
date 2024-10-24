<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    // Menampilkan data karyawan
    public function index()
    {
        // Ambil semua data karyawan dari database
        $karyawans = Karyawan::all();

        // Pastikan data karyawan ada dan dikirim ke view
        return view('datakaryawan', compact('karyawans'));
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        return view('tambah_karyawan');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:karyawans',
            'tahun_kenaikan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
        ]);

        Karyawan::create([
            'nama' => $validateData['nama'],
            'nip' => $validateData['nip'],
            'tahun_kenaikan' => $validateData['tahun_kenaikan'],
            'jabatan' => $validateData['jabatan'],
            'golongan' => $validateData['golongan'],
            'pangkat' => $validateData['pangkat'],
            'no_telp' => $validateData['no_telp'],
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    // Menampilkan halaman edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('edit_karyawan', compact('karyawan'));
    }

    // Mengupdate data karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'tahun_kenikan' => 'required',
            'golongan' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tahun_kenaikan' => $request->tahun_kenaikan,
            'golongan' => $request->golongan,
            'pangkat' => $request->pangkat,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan berhasil diperbarui');
    }


    // Menghapus data karyawan
    public function destroy($id)
    {
        // Mengambil data karyawan berdasarkan id dan menghapus
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        // Redirect ke halaman data karyawan setelah berhasil dihapus
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }

    //Mengecek validasi NIP
    public function checkNip(Request $request)
    {
        $exists = Karyawan::where('nip', $request->nip)->exists();
        return response()->json(['exists' => $exists]);
    }
}
