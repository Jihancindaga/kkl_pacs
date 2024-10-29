<?php

namespace App\Http\Controllers;

use App\Models\Fungsional;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class FungsionalController extends Controller
{
    public function show($karyawan_id)
    {
        $karyawan = Karyawan::findOrFail($karyawan_id);
        return view('fungsional', compact('karyawan'));
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
            'file10' => 'required|file|mimes:pdf',
            'file11' => 'required|file|mimes:pdf',
            
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 11; $i++) {
            $fileField = "file{$i}";
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("kenaikan_pangkat_fungsional/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }
        // Simpan data ke tabel tugas_belajar
        Fungsional::create([
            'karyawan_id' => $karyawan->id,
            'sk_cpns'=> $files['file1'] ?? null,
            'sk_pns'=> $files['file2'] ?? null,
            'sk_ploting_terakhir'=> $files['file3'] ?? null,
            'sk_pengangkatan_jabatan_fungsional'=> $files['file4'] ?? null,
            'berita_acara_pelantikan'=> $files['file5'] ?? null,
            'penilaian_kinerja'=> $files['file6'] ?? null,
            'pak'=> $files['file7'] ?? null,
            'pak_integrasi'=> $files['file8'] ?? null,
            'sk_pengangkatan_pertama_fungsional'=> $files['file9'] ?? null,
            'sk_kenaikan_jabatan_fungsional'=> $files['file10'] ?? null,
            'rekomendasi_kepala_instansi'=> $files['file11'] ?? null,
        ]);

        return redirect()->route('fungsional.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
