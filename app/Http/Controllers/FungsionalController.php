<?php

namespace App\Http\Controllers;

use App\Models\Fungsional;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class FungsionalController extends Controller
{
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Ambil semua data kenaikan pangkat fungsional dan urutkan berdasarkan tanggal upload terbaru
        $kenaikanPangkatFungsional = Fungsional::where('karyawan_id', $id)
            ->orderBy('tanggal_upload_sk_cpns', 'desc')
            ->orderBy('tanggal_upload_sk_pns', 'desc')
            ->orderBy('tanggal_upload_sk_ploting_terakhir', 'desc')
            ->orderBy('tanggal_upload_sk_pengangkatan_jabatan_fungsional', 'desc')
            ->orderBy('tanggal_upload_sk_kenaikan_pangkat_terakhir', 'desc')
            ->orderBy('tanggal_upload_ijazah_terakhir', 'desc')
            ->orderBy('tanggal_upload_transkrip_nilai', 'desc')
            ->orderBy('tanggal_upload_sk_pmk', 'desc')
            ->orderBy('tanggal_upload_penilaian_kinerja', 'desc')
            ->orderBy('tanggal_upload_sertifikat_uji_kompetensi', 'desc')
            ->orderBy('tanggal_upload_pak', 'desc')
            ->orderBy('tanggal_upload_pak_integrasi', 'desc')
            ->orderBy('tanggal_upload_sk_pengangkatan_pertama_fungsional', 'desc')
            ->orderBy('tanggal_upload_sk_kenaikan_jabatan_fungsional', 'desc')
            ->orderBy('tanggal_upload_rekomendasi_kepala_instansi', 'desc')
            ->get();

        // Urutkan data berdasarkan tanggal gabungan, dengan fallback untuk setiap kolom jika tidak ada tanggal
        $kenaikanPangkatFungsional = $kenaikanPangkatFungsional->sortByDesc(function ($upload) {
            return $upload->tanggal_upload_sk_cpns ??
                $upload->tanggal_upload_sk_pns ??
                $upload->tanggal_upload_sk_ploting_terakhir ??
                $upload->tanggal_upload_sk_pengangkatan_jabatan_fungsional ??
                $upload->tanggal_upload_sk_kenaikan_pangkat_terakhir ??
                $upload->tanggal_upload_ijazah_terakhir ??
                $upload->tanggal_upload_transkrip_nilai ??
                $upload->tanggal_upload_sk_pmk ??
                $upload->tanggal_upload_penilaian_kinerja ??
                $upload->tanggal_upload_sertifikat_uji_kompetensi ??
                $upload->tanggal_upload_pak ??
                $upload->tanggal_upload_pak_integrasi ??
                $upload->tanggal_upload_sk_pengangkatan_pertama_fungsional ??
                $upload->tanggal_upload_sk_kenaikan_jabatan_fungsional ??
                $upload->tanggal_upload_rekomendasi_kepala_instansi;
        });

        return view('fungsional', compact('karyawan', 'kenaikanPangkatFungsional'));
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
            'file12' => 'required|file|mimes:pdf',
            'file13' => 'required|file|mimes:pdf',
            'file14' => 'required|file|mimes:pdf',
            'file15' => 'required|file|mimes:pdf',
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
            'tanggal_upload12' => 'required|date',
            'tanggal_upload13' => 'required|date',
            'tanggal_upload14' => 'required|date',
            'tanggal_upload15' => 'required|date',
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 15; $i++) {
            $fileField = "file{$i}";
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("kenaikan_pangkat_fungsional/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }
        // Simpan data ke tabel tugas_belajar
        Fungsional::create([
            'karyawan_id' => $karyawan->id,
            'sk_cpns' => $files['file1'] ?? null,
            'sk_pns' => $files['file2'] ?? null,
            'sk_ploting_terakhir' => $files['file3'] ?? null,
            'sk_pengangkatan_jabatan_fungsional' => $files['file4'] ?? null,
            'sk_kenaikan_pangkat_terakhir' => $files['file5'] ?? null,
            'ijazah_terakhir' => $files['file6'] ?? null,
            'transkrip_nilai' => $files['file7'] ?? null,
            'sk_pmk' => $files['file8'] ?? null,
            'penilaian_kinerja' => $files['file9'] ?? null,
            'sertifikat_uji_kompetensi' => $files['file10'] ?? null,
            'pak' => $files['file11'] ?? null,
            'pak_integrasi' => $files['file12'] ?? null,
            'sk_pengangkatan_pertama_fungsional' => $files['file13'] ?? null,
            'sk_kenaikan_jabatan_fungsional' => $files['file14'] ?? null,
            'rekomendasi_kepala_instansi' => $files['file15'] ?? null,
            'tanggal_upload_sk_cpns'=> $request->input('tanggal_upload1'),
            'tanggal_upload_sk_pns'=> $request->input('tanggal_upload2'),
            'tanggal_upload_sk_ploting_terakhir'=> $request->input('tanggal_upload3'),
            'tanggal_upload_sk_pengangkatan_jabatan_fungsional'=> $request->input('tanggal_upload4'),
            'tanggal_upload_sk_kenaikan_pangkat_terakhir'=> $request->input('tanggal_upload5'),
            'tanggal_upload_ijazah_terakhir'=> $request->input('tanggal_upload6'),
            'tanggal_upload_transkrip_nilai'=> $request->input('tanggal_upload7'),
            'tanggal_upload_sk_pmk'=> $request->input('tanggal_upload8'),
            'tanggal_upload_penilaian_kinerja'=> $request->input('tanggal_upload9'),
            'tanggal_upload_sertifikat_uji_kompetensi'=> $request->input('tanggal_upload10'),
            'tanggal_upload_pak'=> $request->input('tanggal_upload11'),
            'tanggal_upload_pak_integrasi'=> $request->input('tanggal_upload12'),
            'tanggal_upload_sk_pengangkatan_pertama_fungsional'=> $request->input('tanggal_upload13'),
            'tanggal_upload_sk_kenaikan_jabatan_fungsional'=> $request->input('tanggal_upload14'),
            'tanggal_upload_rekomendasi_kepala_instansi'=> $request->input('tanggal_upload15'),
        ]);

        return redirect()->route('fungsional.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
