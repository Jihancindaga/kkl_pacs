<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nip', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/home'); // Ubah ke '/admin/dashboard' jika itu rute yang diinginkan
        }

        return back()->withErrors([
            'nip' => 'NIP atau password salah.',
        ]);
    }
}
