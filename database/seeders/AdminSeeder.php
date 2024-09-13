<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'nip' => '123456789',
            'password' => bcrypt('password123'),
        ]);
    }
}

