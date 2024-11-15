<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import facade PDF
use App\Models\KenaikanPangkatKpo;
use App\Models\PilihanStruktural;
use App\Models\PenyesuaianIjazah;
use App\Models\Fungsional;
use App\Models\TugasBelajar;


class ReportController extends Controller
{
    public function exportPDF()
    {
        // Ambil data untuk setiap kategori
    $kpo = KenaikanPangkatKpo::with('karyawan')->get();
    $struktural = PilihanStruktural::with('karyawan')->get();
    $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan')->get();
    $fungsional = Fungsional::with('karyawan')->get();
    $tugasBelajar = TugasBelajar::with('karyawan')->get();

    // Masukkan data ke dalam array yang akan dikirim ke view
    $data = [
        'title' => 'Report Kenaikan Pangkat',
        'year' => request('year'),
        'bagian' => request('bagian'),
        'pangkatpengajuan' => request('pangkatpengajuan'),
        'kpo' => $kpo,
        'struktural' => $struktural,
        'penyesuaianIjazah' => $penyesuaianIjazah,
        'fungsional' => $fungsional,
        'tugasBelajar' => $tugasBelajar,
    ];

    // Render blade menjadi PDF
    $pdf = PDF::loadView('export_report', $data);

    // Mengembalikan response PDF yang dapat di-download
    return $pdf->download('report_kenaikan_pangkat.pdf');
}

public function generateReport()
{
    // Ambil data untuk setiap kategori
    $kpo = KenaikanPangkatKpo::with('karyawan')->get();
    $struktural = PilihanStruktural::with('karyawan')->get();
    $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan')->get();
    $fungsional = Fungsional::with('karyawan')->get();
    $tugasBelajar = TugasBelajar::with('karyawan')->get();

    // Kirim data ke view
    return view('report', compact('kpo', 'struktural', 'penyesuaianIjazah', 'fungsional', 'tugasBelajar'));
}

}
