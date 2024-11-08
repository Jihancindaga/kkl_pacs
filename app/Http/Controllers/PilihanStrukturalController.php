<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan; // Model untuk tabel karyawans
use App\Models\PilihanStruktural;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PilihanStrukturalController extends Controller
{
    /**
     * Menampilkan halaman tugas belajar.
     */
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Ambil semua data pilihan struktural dan urutkan berdasarkan tanggal upload terbaru
        $pilihanStruktural = PilihanStruktural::where('karyawan_id', $id)
            ->orderBy('tanggal_upload', 'desc')
            ->get();

        // Jika Anda ingin membuat urutan berdasarkan satu tanggal gabungan atau lain 
        // Anda bisa menggunakan Collection setelah mengambil datanya
        $pilihanStruktural = $pilihanStruktural->sortByDesc(function ($upload) {
            return $upload->tanggal_upload;
        });

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
            'sk_jabatan' => $files['file4'] ?? null,
            'spmt' => $files['file5'] ?? null,
            'berita_acara_pelantikan' => $files['file6'] ?? null,
            'surat_pernyataan_pelantikan' => $files['file7'] ?? null,
            'penilaian_kinerja' => $files['file8'] ?? null,
            'surat_gelar_bkn' => $files['file9'] ?? null,
            'sttpp_diklatpim_iii' => $files['file10'] ?? null,
            'rekomendasi_kepala_instansi' => $files['file11'] ?? null,
            'tanggal_upload' => Carbon::now(),
        ]);

        return redirect()->route('pilihan-struktural.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}