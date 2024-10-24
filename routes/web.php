<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\FormDataController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\VehicleDeletionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('/admin/dashboard');
});
Route::get('/datakaryawan', function () {
    return view('/datakaryawan');
});
Route::get('/home', function () {
    return view('home'); // Pastikan file 'home.blade.php' ada di 'resources/views/'
})->name('home');

Route::get('/pajak', function () {
    return view('pajak');
});
Route::get('/hapus-kendaraan', function () {
    return view('hapus-kendaraan');
});
Route::get('/daftar-hapus-kendaraan', function () {
    return view('daftar-hapus-kendaraan');
});
Route::get('/tambahadmin', function () {
    return view('tambahadmin');
})->name('tambah.admin');

Route::get('/upload/kpo', function () {
    return view('/upload/kpo');
});
Route::get('/upload/struktural', function () {
    return view('/upload/struktural');
});
Route::get('/upload/penyesuaian-ijasah', function () {
    return view('/upload/penyesuaian-ijasah');
});
Route::get('/upload/fungsional', function () {
    return view('/upload/fungsional');
});
Route::get('/upload/tugas-belajar', function () {
    return view('/upload/tugas-belajar');
});

// web.php
Route::get('/tambahadmin', [AdminDashboardController::class, 'create'])->name('admin.tambah');

Route::get('/hapus-kendaraan', [VehicleDeletionController::class, 'create'])->name('hapus.kendaraan');
Route::post('/hapus-kendaraan', [VehicleDeletionController::class, 'store'])->name('hapus.kendaraan.store');
Route::get('/daftar-hapus-kendaraan', [VehicleDeletionController::class, 'index'])->name('daftar.hapus.kendaraan');

// Rute untuk Dashboard Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Rute untuk Login Admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login/store', [AdminLoginController::class, 'login'])->name('admin.login.post');

// Rute untuk Logout Admin
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::resource('vehicles', VehicleController::class);
Route::get('/pajak', [VehicleController::class, 'index'])->name('vehicles.index');

Route::get('/vehicles/{plat}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{plat}', [VehicleController::class, 'update'])->name('vehicles.update');

// routes/web.php
// Route untuk menampilkan riwayat
Route::get('/riwayat', [VehicleController::class, 'riwayat'])->name('riwayat');

Route::get('/riwayat/{id}', [VehicleController::class, 'showDetail'])->name('riwayat.detail');

// Route untuk menampilkan semua kendaraan (tabel pajak)
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');

// Route untuk menampilkan riwayat kendaraan (tabel riwayat)
Route::get('/vehicles/riwayat', [VehicleController::class, 'riwayat'])->name('vehicles.riwayat');

// Route untuk menampilkan detail riwayat kendaraan
Route::get('/vehicles/{plat}/riwayat', [VehicleController::class, 'showDetail'])->name('vehicles.showDetail');

// Route untuk menampilkan form tambah kendaraan
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');

// Route untuk menyimpan kendaraan baru
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

// Route untuk menampilkan form edit kendaraan
Route::get('/vehicles/{plat}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');

// Route untuk mengupdate kendaraan
Route::put('/vehicles/{plat}', [VehicleController::class, 'update'])->name('vehicles.update');

// Route untuk menghapus kendaraan
Route::delete('/vehicles/{plat}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

// Route untuk menampilkan detail riwayat kendaraan dengan pencarian
Route::get('/vehicles/{plat}/riwayat/search', [VehicleController::class, 'showRiwayat'])->name('vehicles.showRiwayat');


// web.php
Route::post('/admin/store', [AdminDashboardController::class, 'store'])->name('admin.store');
Route::get('/admin/list', [AdminDashboardController::class, 'index'])->name('admin.list');

// // Rute untuk halaman daftar pengguna
// Route::get('/admin/list', [AdminDashboardController::class, 'list'])->name('admin.list');

// Rute untuk mengedit admin
Route::get('/admin/edit/{id}', [AdminDashboardController::class, 'edit'])->name('admin.edit');

// Rute untuk memperbarui admin
Route::post('/admin/update/{id}', [AdminDashboardController::class, 'update'])->name('admin.update');

// Rute untuk menghapus admin
Route::delete('/admin/delete/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.delete');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::get('/form_data', [FormDataController::class, 'create'])->name('form_data.create');
Route::post('/form_data', [FormDataController::class, 'store'])->name('form_data.store');

Route::post('/tabelpajak/send/{id}', [MessageController::class, 'send'])->name('send.notification');

// Route::put('/vehicles/{plat}', [VehicleController::class, 'update'])->name('vehicles.update');

// route ganti password 
Route::get('/admin/change-password/{id}', [AdminDashboardController::class, 'changePassword'])->name('admin.change_password');
Route::put('/admin/update-password/{id}', [AdminDashboardController::class, 'updatePassword'])->name('admin.update_password');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index');

//route baru

// routes/web.php

// Route untuk menampilkan form pembayaran
Route::get('/bayar/{id}', [PembayaranController::class, 'create'])->name('bayar.create');

// Route untuk menyimpan pembayaran
Route::post('/bayar/{id}', [PembayaranController::class, 'store'])->name('bayar.store');

// Route untuk menampilkan riwayat pembayaran
Route::get('/riwayat', [PembayaranController::class, 'index'])->name('riwayat.index');
Route::get('/riwayat-detail/{id}', [PembayaranController::class, 'show'])->name('riwayat.show.detail');

Route::get('/pajak', [VehicleController::class, 'index'])->name('pajak');

// route cek NIP
Route::get('/check-nip', [AdminController::class, 'checkNIP'])->name('check.nip');

//route data karyawan
Route::resource('karyawan', KaryawanController::class);
Route::get('/datakaryawan', [KaryawanController::class, 'index']);

// Route untuk halaman edit karyawan
Route::get('/edit-karyawan/{id}', [KaryawanController::class, 'edit'])->name('edit_karyawan');

// Route untuk menyimpan perubahan karyawan setelah di-edit
Route::post('/update-karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');

// Route untuk halaman Data Karyawan
Route::get('/datakaryawan', [KaryawanController::class, 'index'])->name('datakaryawan');

// Route untuk halaman tambah Data Karyawan
Route::get('/tambah-karyawan', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/tambah-karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');