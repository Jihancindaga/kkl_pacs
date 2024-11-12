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
            'tanggal_kenaikan_gaji' => 'required|string|max:255',
            'tanggal_kenaikan_pangkat' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bagian' => 'required|string|max:255',
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
            'tanggal_kenaikan_gaji' => 'required',
            'tanggal_kenaikan_pangkat' => 'required',
            'golongan' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'bagian' => 'required',
            'no_telp' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan berhasil diperbarui');
    }

    public function showRiwayatKenaikan()
    {
        $karyawans = Karyawan::all();
        return view('riwayat_kenaikan', compact('karyawans'));
    }

    // Mengecek validasi NIP
    public function checkNip(Request $request)
    {
        $exists = Karyawan::where('nip', $request->nip)->exists();
        return response()->json(['exists' => $exists]);
    }
    // Controller Method

    // Tampilkan halaman hapus karyawan
    public function showHapusKaryawan($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view(
            'hapus_karyawan',
            compact('karyawan')
        );
    }

    // Proses hapus karyawan
    public function hapusKaryawan(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Simpan data ke tabel tabel_karyawan_nonaktif
        RiwayatKaryawanNonaktif::create([
            'nip' => $karyawan->nip,
            'nama' => $karyawan->nama,
            'jabatan' => $karyawan->jabatan,
            'alasan' => $request->alasan,
            'tanggal_penghapusan' => $request->tanggal_penghapusan,
        ]);

        // Hapus data dari tabel karyawans
        $karyawan->delete();

        // Redirect ke halaman riwayat_karyawan_nonaktif
        return redirect()->route('riwayat_karyawan_nonaktif');
    }

    // Tampilkan riwayat karyawan nonaktif
    public function riwayatKaryawanNonaktif()
    {
        $riwayatKaryawans = RiwayatKaryawanNonaktif::all();
        return view('riwayat_karyawan_nonaktif', compact('riwayatKaryawans'));
    }
}
