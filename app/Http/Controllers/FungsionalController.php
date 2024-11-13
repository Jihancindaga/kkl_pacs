<?php

namespace App\Http\Controllers;

use App\Models\Fungsional;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FungsionalController extends Controller
{
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);



        // Ambil semua data kenaikan pangkat fungsional dan urutkan berdasarkan tanggal upload terbaru
        $kenaikanPangkatFungsional = Fungsional::where('karyawan_id', $id)
            ->orderBy('tahun_pengajuan', 'desc')
            ->get();

        // Urutkan data berdasarkan tanggal gabungan, dengan fallback untuk setiap kolom jika tidak ada tanggal
        $kenaikanPangkatFungsional = $kenaikanPangkatFungsional->sortByDesc(function ($upload) {
            return $upload->tanggal_upload;
        });

        return view('fungsional', compact('karyawan', 'kenaikanPangkatFungsional'));
    }

    /**
     * Simpan file persyaratan tugas belajar.
     */
    public function store(Request $request, $karyawan_id)
    {
        $request->validate([
            'golongan' => 'required|string',
            'pangkat' => 'required|string',
            'kategori' => 'required|string',
            'tahun_pengajuan' => 'required|integer',
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
            'golongan' => $request->golongan,
            'pangkat' => $request->pangkat,
            'kategori' => $request->input('kategori'),
            'tahun_pengajuan' => $request->tahun_pengajuan,
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
            'tanggal_upload' => Carbon::now(),
        ]);

        return redirect()->route('fungsional.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
