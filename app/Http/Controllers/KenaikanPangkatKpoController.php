<?php

namespace App\Http\Controllers;

use App\Models\KenaikanPangkatKpo;
use App\Models\Karyawan; // Tambahkan ini
use Illuminate\Http\Request;

class KenaikanPangkatKpoController extends Controller
{
    public function show($karyawan_id)
    {
        $karyawan = Karyawan::findOrFail($karyawan_id);
        return view('kpo', compact('karyawan'));
    }

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
                $path = $request->file($fileField)->store("kenaikan_pangkat_kpo/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }

        // Menyimpan data ke tabel
        KenaikanPangkatKpo::create([
            'karyawan_id' => $karyawan->id,
            'sk_kenaikan_pangkat_terakhir' => $files['file1'] ?? null,
            'sk_pmk' => $files['file2'] ?? null,
            'sk_jabatan_pelaksana_terakhir' => $files['file3'] ?? null,
            'penilaian_kinerja' =>$files['file4'] ?? null,
            'ijazah_terakhir' => $files['file5'] ?? null,
            'transkrip_nilai' => $files['file6'] ?? null,
            'surat_gelar_bkn' => $files['file7'] ?? null,
            'stlud' => $files['file8'] ?? null,
            'rekomendasi_kepala_instansi' => $files['file9'] ?? null,
        ]);

        return redirect()->route('kpo.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}