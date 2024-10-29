<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyesuaianIjazah; // Model untuk tabel tugas_belajar
use App\Models\Karyawan; // Model untuk tabel karyawans
use Illuminate\Support\Facades\Storage;

class PenyesuaianIjazahController extends Controller
{
    /**
     * Menampilkan halaman tugas belajar.
     */
    public function show($karyawan_id)
    {
        $karyawan = Karyawan::findOrFail($karyawan_id);
        return view('penyesuaian-ijazah', compact('karyawan'));
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
            'file9' => 'required|file|mimes:pdf',
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 9; $i++) {
            $fileField = "file{$i}";
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("kenaikan_pangkat_penyesuaian_ijazah/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }

        // Simpan data ke tabel tugas_belajar
        PenyesuaianIjazah::create([
            'karyawan_id' => $karyawan->id,
           'sk_kenaikan_pangkat_terakhir'=> $files['file1'] ?? null,
           'sk_jabatan_terakhir'=> $files['file2'] ?? null,
           'ijazah_terakhir'=> $files['file3'] ?? null,
            'transkrip_nilai'=> $files['file4'] ?? null,
            'surat_akreditasi'=> $files['file5'] ?? null,
            'surat_ijin_belajar'=> $files['file6'] ?? null,
            'stl_ujian_kenaikan'=> $files['file7'] ?? null,
            'penilaian_kinerja'=> $files['file8'] ?? null,
           'surat_uraian_tugas'=> $files['file9'] ?? null,
            'rekomendasi_kepala_instansi'=> $files['file1'] ?? null,
        ]);

        return redirect()->route('penyesuaian-ijazah.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}