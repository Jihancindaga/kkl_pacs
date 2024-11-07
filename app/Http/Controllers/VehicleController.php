<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\RiwayatPembayaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class VehicleController extends Controller
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Tentukan prefix berdasarkan jenis kendaraan
            if ($model->jenis_kendaraan === 'motor') {
                $prefix = 'mtr-';
            } elseif ($model->jenis_kendaraan === 'mobil') {
                $prefix = 'mbl-';
            } else {
                $prefix = 'unk-'; // Jika jenis kendaraan tidak diketahui
            }

            // Ambil ID auto-increment dan tambahkan prefix
            $model->kode_kendaraan = $prefix . $model->id;
            $model->save(); // Simpan perubahan ke database
        });
    }

    // Menampilkan semua kendaraan (tabel pajak)
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pajak', compact('vehicles'));
        
    }

    // Menampilkan riwayat kendaraan (tabel riwayat)
    public function riwayat()
    {
        $vehicles = Vehicle::where('deleted_at', null)->get();
        return view('riwayat', compact('vehicles'));
    }

    // Menampilkan detail riwayat kendaraan
    public function showDetail($id)
    {
        $vehicle = Vehicle::where('id', $id)->firstOrFail();
        $riwayatPembayaran = RiwayatPembayaran::where('id', $id)->latest()->get();

        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
    }

        public function create()
        {
            // Ambil semua data kendaraan untuk ditampilkan di view
            $vehicles = Vehicle::all();
            return view('form_data', compact('vehicles'));
        }
        public function store(Request $request)
        {
            // Validasi data kendaraan
            $validatedData = $request->validate([
                'plat' => 'required|string|max:15',
                'pengguna' => 'required|string|max:255',
                'jenis_kendaraan' => 'required|string|max:255',  // Jenis kendaraan: Motor atau Mobil
                'merk_kendaraan' => 'required|string|max:255',
                'waktu_pajak' => 'required|date',
                'ganti_plat' => 'required|date',
                'usia_kendaraan' => 'required|integer',
                'cc' => 'required|integer',
                'nomor_telepon' => 'required|string|max:15',
            ]);
    
            // Tentukan prefix berdasarkan jenis kendaraan
            $jenisKendaraanPrefix = ($request->jenis_kendaraan == 'Motor') ? 'MT' : 'MB'; // 'MT' untuk motor, 'MB' untuk mobil
    
            // Generate angka acak dua digit
            $randomNumber = rand(10, 99);
    
            // Gabungkan prefix dengan angka acak
            $kodeKendaraan = "{$jenisKendaraanPrefix}-{$randomNumber}";
    
            // Cek apakah kendaraan dengan kode ini sudah ada
            $existingVehicle = Vehicle::where('kode_kendaraan', $kodeKendaraan)->first();
    
            // Jika kendaraan dengan kode ini sudah ada, buat kode baru
            while ($existingVehicle) {
                $randomNumber = rand(10, 99);  // Generate angka acak lagi jika duplikat
                $kodeKendaraan = "{$jenisKendaraanPrefix}-{$randomNumber}";
                $existingVehicle = Vehicle::where('kode_kendaraan', $kodeKendaraan)->first();
            }
    
            // Set kode kendaraan ke validatedData
            $validatedData['kode_kendaraan'] = $kodeKendaraan;
    
            // Simpan data kendaraan baru ke database
            Vehicle::create($validatedData);
    
            // Redirect ke halaman daftar kendaraan dengan pesan sukses
            return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan dengan kode: ' . $kodeKendaraan);
        }
         


    // Menampilkan form edit kendaraan
    public function edit($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();

        return view('vehicles.edit', compact('vehicle', 'plat'));
    }

    // Mengupdate kendaraan
    public function update(Request $request, $plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->first();

        // Validasi data
        $validatedData = $request->validate([
            'pengguna' => 'required|string|max:255',
            'ganti_plat' => 'required|date',
            'plat' => 'required|string',
            'cc' => 'required|integer',
            'nomor_telepon' => 'nullable|string',
        ]);

        // Hitung usia kendaraan saat ini berdasarkan tahun pembuatan
        $validatedData['usia_kendaraan'] = now()->year - $vehicle->tahun_pembuatan;

        // Update data kendaraan
        $vehicle->update($validatedData);

        // Redirect ke halaman index
        return redirect()->route('vehicles.index')->with('success', 'Data kendaraan berhasil diperbarui.');

        // Log data request untuk debugging
        \Log::info('Request Data:', $request->all());
        $request->validate([
            'pengguna' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'merk_kendaraan' => 'required|string',
            'waktu_pajak' => 'required|date',
            'ganti_plat' => 'required|date',
            'usia_kendaraan' => 'required|integer',
            'cc' => 'required|integer',
            'total_bayar' => 'required|integer',
            'bukti_pembayaran' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();

        $vehicle->pengguna = $request->input('pengguna');
        $vehicle->jenis_kendaraan = $request->input('jenis_kendaraan');
        $vehicle->merk_kendaraan = $request->input('merk_kendaraan');
        $vehicle->waktu_pajak = $request->input('waktu_pajak');
        $vehicle->ganti_plat = $request->input('ganti_plat');
        $vehicle->usia_kendaraan = $request->input('usia_kendaraan');
        $vehicle->cc = $request->input('cc');
        $vehicle->total_bayar = $request->input('total_bayar');

        if ($request->hasFile('bukti_pembayaran')) {
            // Hapus file yang lama jika ada
            if ($vehicle->bukti_pembayaran) {
                Storage::delete('public/' . $vehicle->bukti_pembayaran);
            }
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $vehicle->bukti_pembayaran = $buktiPembayaranPath;
        }

        // Simpan perubahan data kendaraan
        $vehicle->save();

        // Simpan riwayat pembayaran jika total_bayar diisi
        if ($request->filled('total_bayar')) {
            RiwayatPembayaran::create([
                'plat' => $plat,
                'waktu_pajak' => $request->input('waktu_pajak'),
                'total_bayar' => $request->input('total_bayar'),
                'bukti_pembayaran' => isset($buktiPembayaranPath) ? $buktiPembayaranPath : $vehicle->bukti_pembayaran,
            ]);
        }

        // Ambil data riwayat pembayaran yang terupdate

        $riwayatPembayaran = RiwayatPembayaran::where('plat', $request->plat)->get();

        $riwayatPembayaran = RiwayatPembayaran::where('plat', $vehicle->plat)
            ->latest()
            ->get();

        // Menyimpan pesan notifikasi dalam session
        return redirect()->route('vehicles.index')->with('success', 'Data kendaraan berhasil diperbarui.');
        session()->flash('success', 'Data kendaraan berhasil di-update!');

        return redirect()
            ->route('vehicles.showDetail', $vehicle->plat)
            ->with(compact('vehicle', 'riwayatPembayaran'))
            ->with('success', 'Kendaraan berhasil diperbarui.');
    }

    // Menghapus kendaraan
    public function destroy($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        // Hapus file bukti pembayaran jika ada
        if ($vehicle->bukti_pembayaran) {
            Storage::delete('public/' . $vehicle->bukti_pembayaran);
        }
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus.');
    }

    // Menampilkan detail riwayat kendaraan dengan pencarian
    public function showRiwayat(Request $request, $plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();

        $search = $request->input('search');

        $riwayatPembayaran = RiwayatPembayaran::where('plat', $vehicle->plat)
            ->when($search, function ($query, $search) {
                return $query->where('waktu_pajak', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
    }

    public function riwayatDetail($plat)
    {
        $vehicle = Vehicle::where('plat', $plat)->firstOrFail();
        $riwayatPembayaran = Vehicle::where('plat', $plat)->get();
        return view('riwayat_detail', compact('vehicle', 'riwayatPembayaran'));
    }
}
// // BELUM RAMPUNG SIK YAA

//  // Temukan kendaraan berdasarkan plat
//  $vehicle = Vehicle::where('plat', $plat)->firstOrFail();

//  // Update data kendaraan
//  $vehicle->update($validatedData);

//  // Flash pesan sukses ke session
//  session()->flash('success', 'Data kendaraan berhasil di-update!');

//  // Redirect kembali ke halaman edit (atau list kendaraan)
//  return redirect()->route('vehicles.edit', $plat);
