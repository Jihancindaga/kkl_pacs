<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KenaikanController extends Controller
{
    public function pilihan($id)
    {
        $karyawan = Karyawan::findOrFail($id); // Ambil data karyawan berdasarkan ID
        return view('kenaikanpangkat', compact('karyawan'));
    }
    public function kpo($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('upload.kpo', compact('karyawan'));
    }

    public function struktural($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('upload.struktural', compact('karyawan'));
    }

    public function penyesuaian($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('upload.penyesuaian-ijasah', compact('karyawan'));
    }

    public function fungsional($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('upload.fungsional', compact('karyawan'));
    }

    public function tugasBelajar($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('upload.tugas-belajar', compact('karyawan'));
    }
}
