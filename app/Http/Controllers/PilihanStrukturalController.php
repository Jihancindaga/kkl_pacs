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

        // Ambil semua data pilihan struktural dan urutkan berdasarkan tanggal upload terbaru
        $pilihanStruktural = PilihanStruktural::where('karyawan_id', $id)
            ->orderBy('tanggal_upload_sk_kenaikan_pangkat_terakhir', 'desc')
            ->orderBy('tanggal_upload_ijazah_terakhir', 'desc')
            ->orderBy('tanggal_upload_transkrip_nilai', 'desc')
            ->orderBy('tanggal_upload_sk_jabatan', 'desc')
            ->orderBy('tanggal_upload_spmt', 'desc')
            ->orderBy('tanggal_upload_berita_acara_pelantikan', 'desc')
            ->orderBy('tanggal_upload_surat_pernyataan_pelantikan', 'desc')
            ->orderBy('tanggal_upload_penilaian_kinerja', 'desc')
            ->orderBy('tanggal_upload_surat_gelar_bkn', 'desc')
            ->orderBy('tanggal_upload_sttpp_diklatpim_iii', 'desc')
            ->orderBy('tanggal_upload_rekomendasi_kepala_instansi', 'desc')
            ->get();

        // Jika Anda ingin membuat urutan berdasarkan satu tanggal gabungan atau lain 
        // Anda bisa menggunakan Collection setelah mengambil datanya
        $pilihanStruktural = $pilihanStruktural->sortByDesc(function ($upload) {
            return $upload->tanggal_upload_sk_kenaikan_pangkat_terakhir ??
                $upload->tanggal_upload_ijazah_terakhir ??
                $upload->tanggal_upload_transkrip_nilai ??
                $upload->tanggal_upload_sk_jabatan ??
                $upload->tanggal_upload_spmt ??
                $upload->tanggal_upload_berita_acara_pelantikan ??
                $upload->tanggal_upload_surat_pernyataan_pelantikan ??
                $upload->tanggal_upload_penilaian_kinerja ??
                $upload->tanggal_upload_surat_gelar_bkn ??
                $upload->tanggal_upload_sttpp_diklatpim_iii ??
                $upload->tanggal_upload_rekomendasi_kepala_instansi;
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
            'tanggal_upload1' => 'required|date',
            'tanggal_upload2' => 'required|date',
            'tanggal_upload3' => 'required|date',
            'tanggal_upload4' => 'required|date',
            'tanggal_upload5' => 'required|date',
            'tanggal_upload6' => 'required|date',
            'tanggal_upload7' => 'required|date',
            'tanggal_upload8' => 'required|date',
            'tanggal_upload9' => 'required|date',
            'tanggal_upload10' => 'required|date',
            'tanggal_upload11' => 'required|date',
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
            'tanggal_upload_sk_kenaikan_pangkat_terakhir' => $request->input('tanggal_upload1'),
            'tanggal_upload_ijazah_terakhir' => $request->input('tanggal_upload2'),
            'tanggal_upload_transkrip_nilai' => $request->input('tanggal_upload3'),
            'tanggal_upload_sk_jabatan' => $request->input('tanggal_upload4'),
            'tanggal_upload_spmt'=> $request->input('tanggal_upload5'),
            'tanggal_upload_berita_acara_pelantikan' => $request->input('tanggal_upload6'),
            'tanggal_upload_surat_pernyataan_pelantikan' => $request->input('tanggal_upload7'),
            'tanggal_upload_penilaian_kinerja' => $request->input('tanggal_upload8'),
            'tanggal_upload_surat_gelar_bkn'=> $request->input('tanggal_upload9'),
            'tanggal_upload_sttpp_diklatpim_iii' => $request->input('tanggal_upload10'),
            'tanggal_upload_rekomendasi_kepala_instansi'=> $request->input('tanggal_upload11'),
        ]);

        return redirect()->route('pilihan-struktural.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}