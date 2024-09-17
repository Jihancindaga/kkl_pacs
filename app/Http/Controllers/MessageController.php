<?php

namespace App\Http\Controllers;

// use App\Models\Kendaraan;

use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function send(Request $request, $id): RedirectResponse
    {
        $kendaraan = Vehicle::findOrFail($id);
        $pesan = 'Testing Notifikasi Whatsapp PACSSSSS';
        $nowa = $kendaraan->nomor_telepon;
        $token = 'h4HE!u#hhpf+9Ywbz1Pb';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('target' => $nowa, 'message' => $pesan),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return Redirect::back()->with('success', 'Pesan Notifikasi Terkirim');
    }
}
