<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import facade PDF
use App\Models\KenaikanPangkatKpo;
use App\Models\PilihanStruktural;
use App\Models\PenyesuaianIjazah;
use App\Models\Fungsional;
use App\Models\TugasBelajar;
use App\Exports\KenaikanPangkatExport;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function exportPDF(Request $request)
{
        // dd($request->all());

    // Inisialisasi query untuk setiap model
    $kpo = KenaikanPangkatKpo::with('karyawan');
    $struktural = PilihanStruktural::with('karyawan');
    $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan');
    $fungsional = Fungsional::with('karyawan');
    $tugasBelajar = TugasBelajar::with('karyawan');

    // Terapkan filter jika ada parameter yang diberikan
    if ($request->has('year')) {
        $year = $request->input('year');
        $kpo = $kpo->whereYear('tahun_pengajuan', $year);
        $struktural = $struktural->whereYear('tahun_pengajuan', $year);
        $penyesuaianIjazah = $penyesuaianIjazah->whereYear('tahun_pengajuan', $year);
        $fungsional = $fungsional->whereYear('tahun_pengajuan', $year);
        $tugasBelajar = $tugasBelajar->whereYear('tahun_pengajuan', $year);
    }

    if ($request->has('bagian')) {
        $bagian = $request->input('bagian');
        $kpo = $kpo->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $struktural = $struktural->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $penyesuaianIjazah = $penyesuaianIjazah->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $fungsional = $fungsional->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $tugasBelajar = $tugasBelajar->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
    }

    if ($request->has('pangkatpengajuan')) {
        $pangkatPengajuan = $request->input('pangkatpengajuan');
        $kpo = $kpo->where('pangkat', $pangkatPengajuan);
        $struktural = $struktural->where('pangkat', $pangkatPengajuan);
        $penyesuaianIjazah = $penyesuaianIjazah->where('pangkat', $pangkatPengajuan);
        $fungsional = $fungsional->where('pangkat', $pangkatPengajuan);
        $tugasBelajar = $tugasBelajar->where('pangkat', $pangkatPengajuan);
    }

    // Membuat judul dinamis berdasarkan filter
$title = 'Report Kenaikan Pangkat';
$filterParts = [];

if ($request->input('year')) {
    $filterParts[] = "Tahun " . $request->input('year');
}
if ($request->input('bagian')) {
    $filterParts[] = "Bagian " . $request->input('bagian');
}
if ($request->input('pangkatpengajuan')) {
    $filterParts[] = "Pangkat " . $request->input('pangkatpengajuan');
}

// Gabungkan filter ke dalam judul jika ada
if (!empty($filterParts)) {
    $title .= " - " . implode(' | ', $filterParts);
}
// dd($filterParts);
    // Ambil data dari query yang sudah difilter atau semua data jika tanpa filter
    $data = [
        'title' => $title,
        'year' => $request->input('year'),
        'bagian' => $request->input('bagian'),
        'pangkatpengajuan' => $request->input('pangkatpengajuan'),
        'kpo' => $kpo->get(),
        'struktural' => $struktural->get(),
        'penyesuaianIjazah' => $penyesuaianIjazah->get(),
        'fungsional' => $fungsional->get(),
        'tugasBelajar' => $tugasBelajar->get(),
    ];

    // Render PDF
    $pdf = PDF::loadView('export_report', $data);

    return $pdf->download('report_kenaikan_pangkat.pdf');
}

public function exportExcel(Request $request)
{
    // Log::debug('Request data: ', $request->all());
    // dd($request->all());

    // Inisialisasi query untuk setiap model
    $kpo = KenaikanPangkatKpo::with('karyawan');
    $struktural = PilihanStruktural::with('karyawan');
    $penyesuaianIjazah = PenyesuaianIjazah::with('karyawan');
    $fungsional = Fungsional::with('karyawan');
    $tugasBelajar = TugasBelajar::with('karyawan');

    // Terapkan filter jika ada parameter yang diberikan
    if ($request->has('year')) {
        $year = $request->input('year');
        $kpo = $kpo->whereYear('tahun_pengajuan', $year);
        $struktural = $struktural->whereYear('tahun_pengajuan', $year);
        $penyesuaianIjazah = $penyesuaianIjazah->whereYear('tahun_pengajuan', $year);
        $fungsional = $fungsional->whereYear('tahun_pengajuan', $year);
        $tugasBelajar = $tugasBelajar->whereYear('tahun_pengajuan', $year);
    }

    if ($request->has('bagian')) {
        $bagian = $request->input('bagian');
        $kpo = $kpo->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $struktural = $struktural->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $penyesuaianIjazah = $penyesuaianIjazah->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $fungsional = $fungsional->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
        $tugasBelajar = $tugasBelajar->whereHas('karyawan', function ($query) use ($bagian) {
            $query->where('bagian', $bagian);
        });
    }

    if ($request->has('pangkatpengajuan')) {
        $pangkatPengajuan = $request->input('pangkatpengajuan');
        $kpo = $kpo->where('pangkat', $pangkatPengajuan);
        $struktural = $struktural->where('pangkat', $pangkatPengajuan);
        $penyesuaianIjazah = $penyesuaianIjazah->where('pangkat', $pangkatPengajuan);
        $fungsional = $fungsional->where('pangkat', $pangkatPengajuan);
        $tugasBelajar = $tugasBelajar->where('pangkat', $pangkatPengajuan);
    }

    $title = 'Report Kenaikan Pangkat';
$filterParts = [];

if ($request->input('year')) {
    $filterParts[] = "Tahun " . $request->input('year');
}
if ($request->input('bagian')) {
    $filterParts[] = "Bagian " . $request->input('bagian');
}
if ($request->input('pangkatpengajuan')) {
    $filterParts[] = "Pangkat " . $request->input('pangkatpengajuan');
}

// Gabungkan filter ke dalam judul jika ada
if (!empty($filterParts)) {
    $title .= " - " . implode(' | ', $filterParts);
}

    // Ambil data yang sudah difilter
    $data = [
        'title' => $title,
        'year' => $request->input('year'),
        'bagian' => $request->input('bagian'),
        'pangkatpengajuan' => $request->input('pangkatpengajuan'),
        'kpo' => $kpo->get(),
        'struktural' => $struktural->get(),
        'penyesuaianIjazah' => $penyesuaianIjazah->get(),
        'fungsional' => $fungsional->get(),
        'tugasBelajar' => $tugasBelajar->get(),
    ];
    // dd($data);

    // Eksport ke Excel
    return Excel::download(new KenaikanPangkatExport($data), 'report_kenaikan_pangkat.xlsx');
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
