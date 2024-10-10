<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Method lain di AdminController...

    public function checkNIP(Request $request)
    {
        $exists = Admin::where('nip', $request->nip)->exists();
        return response()->json(['exists' => $exists]);}
}