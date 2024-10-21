<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('karyawans')->insert([
            [
                'nip' => '19661212 199403 1 008',
                'nama' => 'Edy Winarya, S.Sn., M.Si',
                'golongan' => 'IV/c',
                'pangkat' => 'Pembina Utama Muda',
                'jabatan' => 'Kepala Dinas Kebudayaan (Kundha Kabudayan)',
            ],
            [
                'nip' => '19990519 202421 1 001',
                'nama' => 'Omar Alvaro, A.Md',
                'golongan' => 'VII',
                'pangkat' => 'Penata Muda Tingkat I',
                'jabatan' => 'Arsiparis Terampil',
            ],
            [
                'nip' => '19670301 199403 1 005',
                'nama' => 'Arif Marwoto, S.H., MAP',
                'golongan' => 'IV/b',
                'pangkat' => 'Pembina Tingkat I',
                'jabatan' => 'Sekretaris Dinas Kebudayaan (Kundha Kabudayan)',
            ],
            [
                'nip' => '19700909 199603 2 003',
                'nama' => 'Wiwiek Diani Wijayanti, S.Sn',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Kepala Subbagian Umum dan Kepegawaian Sekretariat',
            ],
            [
                'nip' => '19910408 202202 2 002',
                'nama' => 'Fajar Subekti, S.E.',
                'golongan' => 'III/a',
                'pangkat' => 'Penata Muda',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Subbagian Umum dan Kepegawaian Sekretariat',
            ],
        ]);
        
    }
}
