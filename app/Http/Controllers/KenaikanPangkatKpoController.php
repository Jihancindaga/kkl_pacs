<?php

namespace App\Http\Controllers;

use App\Models\KenaikanPangkatKpo;
use App\Models\Karyawan; // Tambahkan ini
use Illuminate\Http\Request;

class KenaikanPangkatKpoController extends Controller
{
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Ambil semua data kenaikan pangkat KPO dan urutkan berdasarkan tanggal upload terbaru
        $kenaikanPangkatKpo = KenaikanPangkatKpo::where('karyawan_id', $id)
            ->orderBy('tanggal_upload_sk_kenaikan_pangkat_terakhir', 'desc')
            ->orderBy('tanggal_upload_sk_pmk', 'desc')
            ->orderBy('tanggal_upload_sk_jabatan_pelaksana_terakhir', 'desc')
            ->orderBy('tanggal_upload_penilaian_kinerja', 'desc')
            ->orderBy('tanggal_upload_ijazah_terakhir', 'desc')
            ->orderBy('tanggal_upload_transkrip_nilai', 'desc')
            ->orderBy('tanggal_upload_surat_gelar_bkn', 'desc')
            ->orderBy('tanggal_upload_stlud', 'desc')
            ->orderBy('tanggal_upload_rekomendasi_kepala_instansi', 'desc')
            ->get();

        // Urutkan data berdasarkan tanggal gabungan, dengan fallback untuk setiap kolom jika tidak ada tanggal
        $kenaikanPangkatKpo = $kenaikanPangkatKpo->sortByDesc(function ($upload) {
            return $upload->tanggal_upload_sk_kenaikan_pangkat_terakhir ??
                $upload->tanggal_upload_sk_pmk ??
                $upload->tanggal_upload_sk_jabatan_pelaksana_terakhir ??
                $upload->tanggal_upload_penilaian_kinerja ??
                $upload->tanggal_upload_ijazah_terakhir ??
                $upload->tanggal_upload_transkrip_nilai ??
                $upload->tanggal_upload_surat_gelar_bkn ??
                $upload->tanggal_upload_stlud ??
                $upload->tanggal_upload_rekomendasi_kepala_instansi;
        });

        return view('kpo', compact('karyawan', 'kenaikanPangkatKpo'));
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
            'tanggal_upload1' => 'required|date',
            'tanggal_upload2' => 'required|date',
            'tanggal_upload3' => 'required|date',
            'tanggal_upload4' => 'required|date',
            'tanggal_upload5' => 'required|date',
            'tanggal_upload6' => 'required|date',
            'tanggal_upload7' => 'required|date',
            'tanggal_upload8' => 'required|date',
            'tanggal_upload9' => 'required|date',
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
            'penilaian_kinerja' => $files['file4'] ?? null,
            'ijazah_terakhir' => $files['file5'] ?? null,
            'transkrip_nilai' => $files['file6'] ?? null,
            'surat_gelar_bkn' => $files['file7'] ?? null,
            'stlud' => $files['file8'] ?? null,
            'rekomendasi_kepala_instansi' => $files['file9'] ?? null,
            'tanggal_upload_sk_kenaikan_pangkat_terakhir'=> $request->input('tanggal_upload1'),
            'tanggal_upload_sk_pmk'=> $request->input('tanggal_upload2'), 
            'tanggal_upload_sk_jabatan_pelaksana_terakhir'=> $request->input('tanggal_upload3'), 
            'tanggal_upload_penilaian_kinerja'=> $request->input('tanggal_upload4'),
            'tanggal_upload_ijazah_terakhir'=> $request->input('tanggal_upload5'), 
            'tanggal_upload_transkrip_nilai'=> $request->input('tanggal_upload6'),
            'tanggal_upload_surat_gelar_bkn'=> $request->input('tanggal_upload7'), 
            'tanggal_upload_stlud'=> $request->input('tanggal_upload8'),
            'tanggal_upload_rekomendasi_kepala_instansi'=> $request->input('tanggal_upload9'), 
        ]);

        return redirect()->route('kpo.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
