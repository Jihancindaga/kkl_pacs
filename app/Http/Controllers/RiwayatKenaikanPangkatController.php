<?php

namespace App\Http\Controllers;

use App\Models\KenaikanPangkatKpo;
use App\Models\PilihanStruktural;
use App\Models\PenyesuaianIjazah;
use App\Models\Fungsional;
use App\Models\TugasBelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class RiwayatKenaikanPangkatController extends Controller
{
    public function index(Request $request)
{
    $year = $request->input('year'); // Get the selected year
    $bagian = $request->input('bagian'); // Get the selected bagian (Kesekretariatan, Atlas, SBSP, UPTD)
    $pangkat = $request->input('pangkat');
    $pangkatPengajuan = $request->input('pangkatpengajuan');

    // Inisialisasi query untuk setiap model
    $kpo = KenaikanPangkatKpo::with('karyawan')->orderBy('tahun_pengajuan', 'desc');
    $struktural = PilihanStruktural::with('karyawan')->orderBy('tahun_pengajuan', 'desc');
    $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan')->orderBy('tahun_pengajuan', 'desc');
    $fungsional = Fungsional::with('karyawan')->orderBy('tahun_pengajuan', 'desc');
    $tugasBelajar = TugasBelajar::with('karyawan')->orderBy('tahun_pengajuan', 'desc');

    // Apply year filter
    if ($year) {
        $kpo = $kpo->whereYear('tahun_pengajuan', $year);
        $struktural = $struktural->whereYear('tahun_pengajuan', $year);
        $penyesuaianIjazah = $penyesuaianIjazah->whereYear('tahun_pengajuan', $year);
        $fungsional = $fungsional->whereYear('tahun_pengajuan', $year);
        $tugasBelajar = $tugasBelajar->whereYear('tahun_pengajuan', $year);
    }

    // Apply bagian filter
    if ($bagian) {
        $kpo = $kpo->whereHas('karyawan', function($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $struktural = $struktural->whereHas('karyawan', function($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $penyesuaianIjazah = $penyesuaianIjazah->whereHas('karyawan', function($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $fungsional = $fungsional->whereHas('karyawan', function($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $tugasBelajar = $tugasBelajar->whereHas('karyawan', function($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
    }


    // Apply pangkat pengajuan filter
    if ($pangkatPengajuan) {
        // Filter berdasarkan pangkat pengajuan di setiap model
        $kpo = $kpo->where('pangkat', $pangkatPengajuan);
        $struktural = $struktural->where('pangkat', $pangkatPengajuan);
        $penyesuaianIjazah = $penyesuaianIjazah->where('pangkat', $pangkatPengajuan);
        $fungsional = $fungsional->where('pangkat', $pangkatPengajuan);
        $tugasBelajar = $tugasBelajar->where('pangkat', $pangkatPengajuan);
    }

    // Ambil data sesuai filter atau tampilkan data awal jika tidak ada filter
    $kpo = $kpo->get();
    $struktural = $struktural->get();
    $penyesuaianIjazah = $penyesuaianIjazah->get();
    $fungsional = $fungsional->get();
    $tugasBelajar = $tugasBelajar->get();

    return view('report', compact('kpo', 'struktural', 'penyesuaianIjazah', 'fungsional', 'tugasBelajar'));
}



}
