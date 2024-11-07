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
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Ambil semua data penyesuaian ijazah berdasarkan karyawan_id
        $penyesuaianIjazah = PenyesuaianIjazah::where('karyawan_id', $id)
            ->orderBy('tanggal_upload_sk_kenaikan_pangkat_terakhir', 'desc')
            ->orderBy('tanggal_upload_sk_jabatan_terakhir', 'desc')
            ->orderBy('tanggal_upload_ijazah_terakhir', 'desc')
            ->orderBy('tanggal_upload_transkrip_nilai', 'desc')
            ->orderBy('tanggal_upload_surat_akreditasi', 'desc')
            ->orderBy('tanggal_upload_surat_ijin_belajar', 'desc')
            ->orderBy('tanggal_upload_stl_ujian_kenaikan', 'desc')
            ->orderBy('tanggal_upload_penilaian_kinerja', 'desc')
            ->orderBy('tanggal_upload_surat_uraian_tugas', 'desc')
            ->orderBy('tanggal_upload_rekomendasi_kepala_instansi', 'desc')
            ->get();

        // Jika Anda ingin mengurutkan berdasarkan satu tanggal gabungan atau lain
        // Anda bisa menggunakan Collection setelah mengambil datanya
        $penyesuaianIjazah = $penyesuaianIjazah->sortByDesc(function ($upload) {
            return $upload->tanggal_upload_sk_kenaikan_pangkat_terakhir ??
                $upload->tanggal_upload_sk_jabatan_terakhir ??
                $upload->tanggal_upload_ijazah_terakhir ??
                $upload->tanggal_upload_transkrip_nilai ??
                $upload->tanggal_upload_surat_akreditasi ??
                $upload->tanggal_upload_surat_ijin_belajar ??
                $upload->tanggal_upload_stl_ujian_kenaikan ??
                $upload->tanggal_upload_penilaian_kinerja ??
                $upload->tanggal_upload_surat_uraian_tugas ??
                $upload->tanggal_upload_rekomendasi_kepala_instansi;
        });

        return view('penyesuaian-ijazah', compact('karyawan', 'penyesuaianIjazah'));
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
        ]);

        // Mengambil data karyawan terkait
        $karyawan = Karyawan::findOrFail($karyawan_id);

        // Menyimpan file persyaratan
        $files = [];
        for ($i = 1; $i <= 10; $i++) {
            $fileField = "file{$i}";
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("kenaikan_pangkat_penyesuaian_ijazah/{$karyawan->nip}", 'public');
                $files[$fileField] = $path;
            }
        }

        // Simpan data ke tabel tugas_belajar
        PenyesuaianIjazah::create([
            'karyawan_id' => $karyawan->id,
            'sk_kenaikan_pangkat_terakhir' => $files['file1'] ?? null,
            'sk_jabatan_terakhir' => $files['file2'] ?? null,
            'ijazah_terakhir' => $files['file3'] ?? null,
            'transkrip_nilai' => $files['file4'] ?? null,
            'surat_akreditasi' => $files['file5'] ?? null,
            'surat_ijin_belajar' => $files['file6'] ?? null,
            'stl_ujian_kenaikan' => $files['file7'] ?? null,
            'penilaian_kinerja' => $files['file8'] ?? null,
            'surat_uraian_tugas' => $files['file9'] ?? null,
            'rekomendasi_kepala_instansi' => $files['file10'] ?? null,
            'tanggal_upload_sk_kenaikan_pangkat_terakhir'=> $request->input('tanggal_upload1'),
            'tanggal_upload_sk_jabatan_terakhir'=> $request->input('tanggal_upload2'),
            'tanggal_upload_ijazah_terakhir'=> $request->input('tanggal_upload3'),
            'tanggal_upload_transkrip_nilai'=> $request->input('tanggal_upload4'),
            'tanggal_upload_surat_akreditasi'=> $request->input('tanggal_upload5'),
            'tanggal_upload_surat_ijin_belajar'=> $request->input('tanggal_upload6'),
            'tanggal_upload_stl_ujian_kenaikan'=> $request->input('tanggal_upload7'),
            'tanggal_upload_penilaian_kinerja'=> $request->input('tanggal_upload8'),
            'tanggal_upload_surat_uraian_tugas'=> $request->input('tanggal_upload9'),
            'tanggal_upload_rekomendasi_kepala_instansi'=> $request->input('tanggal_upload10'),
        ]);

        return redirect()->route('penyesuaian-ijazah.show', $karyawan_id)->with('success', 'Data berhasil disimpan!');
    }
}
