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
            'nama' => 'admin',
            'jabatan' => 'Direktur',
            'alamat' => 'Sleman',
            'no_telp' => '085600937426',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt('password123'),
        ]);
        Admin::create([
            'nip' => '22020881',
            'nama' => 'coba',
            'jabatan' => 'Direktur',
            'alamat' => 'Sleman',
            'no_telp' => '085600937426',
            'jenis_kelamin' => 'Perempuan',
            'password' => bcrypt('jihanc'),
        ]);
        Admin::create([
            'nip' => '197312212007011008',
            'nama' => 'M. Yusuf',
            'jabatan' => 'Kepala',
            'alamat' => 'Sleman',
            'no_telp' => '085869278611',
            'jenis_kelamin' => 'Laki-laki',
            'password' => bcrypt('admin1'),
        ]);
    }
}
