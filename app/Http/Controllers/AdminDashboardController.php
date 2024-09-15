<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Jika menggunakan model Admin

class AdminDashboardController extends Controller
{
    // Metode untuk menampilkan daftar admin
    public function list()
    {
        $admins = Admin::all(); // Ambil semua data admin dari database
        return view('admin.list', ['admins' => $admins]); // Tampilkan di view 'admin.list'
    }

    // Metode untuk menampilkan halaman dashboard
    public function index()
    {
        $admins = Admin::all(); // Mengambil semua admin dari database
        return view('admin.list', compact('admins')); // Menampilkan halaman daftar pengguna
    }

    // Metode untuk menyimpan data admin baru
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:admins',
            'password' => 'required|min:6',
        ]);

        // Menyimpan data admin ke database
        Admin::create([
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
        ]);

        // Setelah menyimpan, alihkan ke halaman daftar pengguna
        return redirect()->route('admin.list');
    }

    // Metode untuk menampilkan halaman edit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Metode untuk mengupdate data admin
    // public function update(Request $request, $id)
    // {
    //     $admin = Admin::findOrFail($id);
    //     $admin->update($request->all());
    //     return redirect()->route('admin.list');
    // }

    public function update(Request $request, $id)
{
    $admin = Admin::findOrFail($id);

    // Cek apakah password diubah
    if ($request->filled('password')) {
        // Hash password baru
        $admin->password = bcrypt($request->password);
    }

    // Update data lainnya
    $admin->nip = $request->nip;

    // Simpan perubahan
    $admin->save();

    return redirect()->route('admin.list')->with('success', 'Admin updated successfully!');
}


    // Metode untuk menghapus data admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.list');
    }
}