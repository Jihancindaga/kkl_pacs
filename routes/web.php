<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;

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

// Rute untuk Halaman Utama
Route::get('/', function () {
    return view('welcome');
});
