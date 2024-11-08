<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasBelajar; // Model untuk tabel tugas_belajar
use App\Models\Karyawan; // Model untuk tabel karyawans
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TugasBelajarController extends Controller
{
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Ambil semua data tugas belajar dan urutkan berdasarkan tanggal upload terbaru
        $tugasBelajar = TugasBelajar::where('karyawan_id', $id)
            ->orderBy('tanggal_upload', 'desc')
            ->get();


        // Jika Anda ingin membuat urutan berdasarkan satu tanggal gabungan atau lain 
        // Anda bisa menggunakan Collection setelah mengambil datanya
        $tugasBelajar = $tugasBelajar->sortByDesc(function ($upload) {
            return $upload->tanggal_upload;
        });

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
            'file6' => 'required|file|mimes:pdf',
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 6; $i++) {
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
            'transkrip_nilai' => $files['file5'] ?? null,
            'sk_pemberhentian_jabatan' => $files['file6'] ?? null,
            'tanggal_upload' => Carbon::now(),
        ]);

        return redirect()->route('tugas-belajar.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
