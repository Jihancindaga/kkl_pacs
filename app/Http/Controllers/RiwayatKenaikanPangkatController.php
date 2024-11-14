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
        $pangkatterakhir = $request->input('pangkatterakhir');

        $kpo = KenaikanPangkatKpo::with('karyawan');
        $struktural = PilihanStruktural::with('karyawan');
        $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan');
        $fungsional = Fungsional::with('karyawan');
        $tugasBelajar = TugasBelajar::with('karyawan');

        // Apply year and bagian filters if they are selected
        if ($year) {
            $kpo = $kpo->whereYear('tahun_pengajuan', $year);
            $struktural = $struktural->whereYear('tahun_pengajuan', $year);
            $penyesuaianIjazah = $penyesuaianIjazah->whereYear('tahun_pengajuan', $year);
            $fungsional = $fungsional->whereYear('tahun_pengajuan', $year);
            $tugasBelajar = $tugasBelajar->whereYear('tahun_pengajuan', $year);
        }

        if ($bagian) {
        // Filter by bagian from the karyawans table
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

     if ($pangkat) {
        // Filter by bagian from the karyawans table
        $kpo = $kpo->whereHas('karyawan', function($query) use ($pangkat) {
            $query->where('pangkat', $pangkat);
        });
        $struktural = $struktural->whereHas('karyawan', function($query) use ($pangkat) {
            $query->where('pangkat', $pangkat);
        });
        $penyesuaianIjazah = $penyesuaianIjazah->whereHas('karyawan', function($query) use ($pangkat) {
            $query->where('pangkat', $pangkat);
        });
        $fungsional = $fungsional->whereHas('karyawan', function($query) use ($pangkat) {
            $query->where('pangkat', $pangkat);
        });
        $tugasBelajar = $tugasBelajar->whereHas('karyawan', function($query) use ($pangkat) {
            $query->where('pangkat', $pangkat);
        });
    }
    if ($pangkatterakhir) {
        $kpo = $kpo->where('pangkat', $pangkat);
        $struktural = $struktural->where('pangkat', $pangkat);
        $penyesuaianIjazah = $penyesuaianIjazah->where('pangkat', $pangkat);
        $fungsional = $fungsional->where('pangkat', $pangkat);
        $tugasBelajar = $tugasBelajar->where('pangkat', $pangkat);
    }
    

        // Get the filtered data
        $kpo = $kpo->get();
        $struktural = $struktural->get();
        $penyesuaianIjazah = $penyesuaianIjazah->get();
        $fungsional = $fungsional->get();
        $tugasBelajar = $tugasBelajar->get();

        return view('report', compact('kpo', 'struktural', 'penyesuaianIjazah', 'fungsional', 'tugasBelajar'));
    }

}
