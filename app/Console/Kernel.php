<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Daftarkan command yang tersedia.
     *
     * @var array
     */
    protected $commands = [
        // Tambahkan command khusus di sini
        \App\Console\Commands\SendReminderNotification::class,
    ];

    /**
     * Definisikan jadwal task yang harus dijalankan.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Contoh untuk menjadwalkan command
        $schedule->command('reminder:send')->dailyAt('09:00');
    }

    /**
     * Daftarkan perintah yang ada untuk aplikasi ini.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
