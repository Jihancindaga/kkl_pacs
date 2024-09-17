<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendReminderNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim notifikasi Whatsapp 1 bulan sebelum tanggal pajak';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Mendapatkan kendaraan yang akan pajaknya jatuh tempo dalam waktu 1 bulan
        $kendaraans = Vehicle::whereDate('waktu_pajak', Carbon::now()->addMonth())->get();

        foreach ($kendaraans as $kendaraan) {
            $nowa = $kendaraan->nomor_telepon;
            $pesan = 'Reminder: Pajak kendaraan Anda akan jatuh tempo pada ' . $kendaraan->tanggal_pajak;
            $token = 'h4HE!u#hhpf+9Ywbz1Pb';

            // Mengirim notifikasi menggunakan Fonnte API
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $nowa,
                'message' => $pesan,
            ]);

            if ($response->successful()) {
                $this->info('Notifikasi terkirim ke ' . $nowa);
            } else {
                $this->error('Gagal mengirim notifikasi ke ' . $nowa);
            }
        }
    }
}
