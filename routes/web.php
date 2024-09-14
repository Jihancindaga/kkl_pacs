<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('/admin/dashboard');
});
// Rute untuk Dashboard Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Rute untuk Login Admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');

// Rute untuk Logout Admin
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/home', function () {
    return view('home'); // Pastikan file 'home.blade.php' ada di 'resources/views/'
})->name('home');

Route::get('/pajak', function () {
    return view('pajak');
});


Route::resource('vehicles', VehicleController::class);
Route::get('/pajak', [VehicleController::class, 'index'])->name('vehicles.index');

Route::get('/vehicles/{plat}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{plat}', [VehicleController::class, 'update'])->name('vehicles.update');

// routes/web.php
// Route untuk menampilkan riwayat
Route::get('/riwayat', [VehicleController::class, 'riwayat'])->name('riwayat');

// Route untuk menampilkan detail riwayat
Route::get('/riwayat/{plat}', [VehicleController::class, 'showDetail'])->name('riwayat.detail');

