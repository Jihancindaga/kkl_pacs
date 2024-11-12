<?php

namespace App\Http\Controllers;
use App\Models\KenaikanPangkatKpo;
use App\Models\PilihanStruktural;
use App\Models\PenyesuaianIjazah;
use App\Models\Fungsional;
use App\Models\TugasBelajar;
use Illuminate\Http\Request;

class RiwayatKenaikanPangkatController extends Controller
{

    public function index()
    {
        $kpo = KenaikanPangkatKpo::with('karyawan')->get();
        $struktural = PilihanStruktural::with('karyawan')->get();
        $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan')->get();
        $fungsional =Fungsional::with('karyawan')->get();
        $tugasBelajar = TugasBelajar::with('karyawan')->get();

        return view('report', compact('kpo', 'struktural', 'penyesuaianIjazah', 'fungsional', 'tugasBelajar'));
    }

}
