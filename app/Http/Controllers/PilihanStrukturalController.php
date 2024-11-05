<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan; // Model untuk tabel karyawans
use App\Models\PilihanStruktural;
use Illuminate\Support\Facades\Storage;

class PilihanStrukturalController extends Controller
{
    /**
     * Menampilkan halaman tugas belajar.
     */
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $pilihanStruktural = PilihanStruktural::where('karyawan_id', $id)->first();
        return view('pilihan-struktural', compact('karyawan', 'pilihanStruktural'));
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
            'file7' => 'required|file|mimes:pdf',
            'file8' => 'required|file|mimes:pdf',
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 8; $i++) {
            $fileField = "file{$i}";
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("kenaikan_pangkat_pilihan_struktural/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }

        // Simpan data ke tabel tugas_belajar
        PilihanStruktural::create([
            'karyawan_id' => $karyawan->id,
            'sk_kenaikan_pangkat_terakhir' => $files['file1'] ?? null,
            'ijazah_terakhir' => $files['file2'] ?? null,
            'transkrip_nilai' => $files['file3'] ?? null,
            'sk_jabatan_spmt' => $files['file4'] ?? null,
            'berita_acara_pelantikan' => $files['file5'] ?? null,
            'surat_pernyataan_pelantikan' => $files['file6'] ?? null,
            'penilaian_kinerja' => $files['file7'] ?? null,
            'surat_gelar_bkn' => $files['file8'] ?? null,
            'sttpp_diklatpim_iii' => $files['file9'] ?? null,
            'rekomendasi_kepala_instansi' => $files['file10'] ?? null,
        ]);

        return redirect()->route('pilihan-struktural.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}