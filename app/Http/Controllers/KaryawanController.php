<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\RiwayatKaryawanNonaktif;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    // Menampilkan data karyawan
    public function index()
    {
        $karyawans = Karyawan::all();
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
            'tahun_kenaikan_gaji' => 'required|string|max:255',
            'tahun_kenaikan_pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
        ]);

        Karyawan::create($validateData);

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
            'tahun_kenaikan_gaji' => 'required',
            'tahun_kenaikan_pangkat' => 'required',
            'golongan' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan berhasil diperbarui');
    }

    // Menghapus data karyawan dan memasukkannya ke tabel riwayat
    public function delete(Request $request)
    {
        $request->validate([
            'nip' => 'required|exists:karyawans,nip',
            'alasan' => 'required|string',
            'tanggal_penghapusan' => 'required|date',
        ]);

        $karyawan = Karyawan::where('nip', $request->nip)->first();

        if ($karyawan) {
            RiwayatKaryawanNonaktif::create([
                'nip' => $karyawan->nip,
                'nama' => $karyawan->nama,
                'jabatan' => $karyawan->jabatan,
                'alasan' => $request->alasan,
                'tanggal_penghapusan' => Carbon::now()->toDateString(),
            ]);

            $karyawan->delete();

            return redirect()->route('riwayat.karyawan.nonaktif')->with('success', 'Data karyawan berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
    }

    // Menampilkan riwayat karyawan nonaktif
    public function riwayatKaryawanNonaktif()
    {
        $riwayatKaryawans = RiwayatKaryawanNonaktif::all();
        return view('riwayat_karyawan_nonaktif', compact('riwayatKaryawans'));
    }

    public function showDeleteForm()
    {
        $karyawans = Karyawan::all();
        return view('hapus_karyawan', compact('karyawans'));
    }


    // Mengecek validasi NIP
    public function checkNip(Request $request)
    {
        $exists = Karyawan::where('nip', $request->nip)->exists();
        return response()->json(['exists' => $exists]);
    }
}