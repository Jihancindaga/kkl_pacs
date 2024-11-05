<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasBelajar; // Model untuk tabel tugas_belajar
use App\Models\Karyawan; // Model untuk tabel karyawans
use Illuminate\Support\Facades\Storage;

class TugasBelajarController extends Controller
{
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $tugasBelajar = TugasBelajar::where('karyawan_id', $id)->first(); // Ambil data tugas belajar jika ada

        return view('tugas-belajar', compact('karyawan', 'tugasBelajar'));
    }

    /**
     * Simpan file persyaratan tugas belajar.
     */
    public function store(Request $request, $karyawan_id)
    {
        $request->validate([
            'file1' => 'required|file|mimes:pdf',
            'file2' => 'required|file|mimes:pdf',
            'file3' => 'required|file|mimes:pdf',
            'file4' => 'required|file|mimes:pdf',
            'file5' => 'required|file|mimes:pdf',
            'tanggal_upload1' => 'required|date',
            'tanggal_upload2' => 'required|date',
            'tanggal_upload3' => 'required|date',
            'tanggal_upload4' => 'required|date',
            'tanggal_upload5' => 'required|date',
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 5; $i++) {
            $fileField = "file{$i}";
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("kenaikan_pangkat_tugas_belajar/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }

        // Simpan data ke tabel tugas_belajar
        TugasBelajar::create([
            'karyawan_id' => $karyawan->id,
            'sk_kenaikan_pangkat_terakhir' => $files['file1'] ?? null,
            'surat_tugas_belajar' => $files['file2'] ?? null,
            'penilaian_kinerja' => $files['file3'] ?? null,
            'ijazah_terakhir' => $files['file4'] ?? null,
            'sk_pemberhentian_jabatan' => $files['file5'] ?? null,
            'tanggal_upload_sk_kenaikan_pangkat' => $request->input('tanggal_upload1'),
            'tanggal_upload_surat_tugas_belajar' => $request->input('tanggal_upload2'),
            'tanggal_upload_penilaian_kinerja' => $request->input('tanggal_upload3'),
            'tanggal_upload_ijazah_terakhir' => $request->input('tanggal_upload4'),
            'tanggal_upload_sk_pemberhentian_jabatan' => $request->input('tanggal_upload5'),
        ]);

        return redirect()->route('tugas-belajar.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
