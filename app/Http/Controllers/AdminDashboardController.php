<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Menggunakan model Admin
use Illuminate\Support\Facades\Hash; // Menggunakan Hash untuk password

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
        return $this->list(); // Menggunakan metode list() untuk mengambil data
    }

    // Metode untuk menyimpan data admin baru
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'nip' => 'required|unique:admins,nip',
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string',
            'password' => 'required|min:6',
        ]);

        // dd($validated);

        // Menyimpan data admin ke database
        Admin::create([
            'nip' => $validated['nip'],
            'nama' => $validated['name'],
            'jabatan' => $validated['jabatan'],
            'no_telp' => $validated['no_telp'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'password' => bcrypt($validated['password']), // Password dienkripsi
        ]);

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('admin.list')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    // Metode untuk menampilkan halaman edit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Metode untuk mengupdate data admin
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:admins,nip,' . $id,
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'password' => 'nullable|string|min:6|confirmed', // Validasi password jika diisi
        ]);

        // Ambil data admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        // Cek apakah password diubah
        if ($request->filled('password')) {
            // Hash password baru
            $admin->password = bcrypt($request->password);
        }

        // Update data lainnya
        $admin->nama = $request->nama;
        $admin->nip = $request->nip;
        $admin->jabatan = $request->jabatan;
        $admin->alamat = $request->alamat;
        $admin->no_telp = $request->no_telp;
        $admin->jenis_kelamin = $request->jenis_kelamin;

        // Simpan perubahan
        $admin->save();

        return redirect()->route('admin.list')->with('success', 'Admin berhasil diperbarui!');
    }

    // Metode untuk menghapus data admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.list')->with('success', 'Admin berhasil dihapus!');
    }

    // Metode untuk menampilkan form ubah password
    public function changePassword($id)
    {
        $admin = Admin::findOrFail($id); // Ambil data admin berdasarkan id
        return view('admin.change_password', compact('admin')); // Tampilkan view dengan data admin
    }

    // Metode untuk update password
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $admin = Admin::findOrFail($id);

        // Cek apakah password lama sesuai
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }

        // Update password baru
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Password berhasil diubah.');
    }
}
