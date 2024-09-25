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
        Admin::create([
            'nip' => '22020881',
            'password' => bcrypt('jihanc'),
        ]);
        Admin::create([
            'nip' => '197312212007011008',
            'password' => bcrypt('admin1'),
        ]);
    }
}
