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
                'tahun_kenaikan' => '2010',
                'golongan' => 'IV/c',
                'pangkat' => 'Pembina Utama Muda',
                'jabatan' => 'Kepala Dinas Kebudayaan (Kundha Kabudayan)',
            ],
            [
                'nip' => '19990519 202421 1 001',
                'nama' => 'Omar Alvaro, A.Md',
                'tahun_kenaikan' => '2010',
                'golongan' => 'VII',
                'pangkat' => 'Penata Muda Tingkat I',
                'jabatan' => 'Arsiparis Terampil',
            ],
            [
                'nip' => '19670301 199403 1 005',
                'nama' => 'Arif Marwoto, S.H., MAP',
                'tahun_kenaikan' => '2010',
                'golongan' => 'IV/b',
                'pangkat' => 'Pembina Tingkat I',
                'jabatan' => 'Sekretaris Dinas Kebudayaan (Kundha Kabudayan)',
            ],
            [
                'nip' => '19700909 199603 2 003',
                'nama' => 'Wiwiek Diani Wijayanti, S.Sn',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Kepala Subbagian Umum dan Kepegawaian Sekretariat',
            ],
            [
                'nip' => '19910408 202202 2 002',
                'nama' => 'Fajar Subekti, S.E.',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/a',
                'pangkat' => 'Penata Muda',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Subbagian Umum dan Kepegawaian Sekretariat',
            ],
            [
                'nip' => '19731221 200701 1 008',
                'nama' => 'M. Yusuf Teguh Santoso',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Pengolah Data dan Informasi pada Subbagian Umum dan Kepegawaian Sekretariat',
            ],
            [
                'nip' => '19730721 200901 2 001',
                'nama' => 'Sumarsih',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Pengadministrasi Perkantoran pada Subbagian Umum dan Kepegawaian Sekretariat',
            ],
            [
                'nip' => '19780223 199803 2 002',
                'nama' => 'Suparyati, S.Ant',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/c',
                'pangkat' => 'Penata',
                'jabatan' => 'Kepala Subbagian Keuangan Sekretariat',
            ],
            [
                'nip' => '19760925 200901 1 001',
                'nama' => 'Muh. Yasir',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Subbagian Keuangan Sekretariat',
            ],
            [
                'nip' => '19940407 202012 2 007',
                'nama' => 'Arum Ati Cholis, A.Md',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/c',
                'pangkat' => 'Pengatur',
                'jabatan' => 'Pengolah Data dan Informasi pada Subbagian Keuangan Sekretariat',
            ],
            [
                'nip' => '19800405 201001 2 005',
                'nama' => 'Ambar Widiyawati',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Pengolah Data dan Informas pada Subbagian Keuangan Sekretariat',
            ],
            [
                'nip' => '19820106 200901 1 002',
                'nama' => 'Turaji',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/b',
                'pangkat' => 'Pengatur Muda Tingkat I',
                'jabatan' => 'Pengolah Data dan Informasi pada Subbagian Keuangan Sekretariat',
            ],
            [
                'nip' => '19740709 199803 2 005',
                'nama' => 'Maria Kristiani, ST, M.T.',
                'tahun_kenaikan' => '2010',
                'golongan' => 'IV/a',
                'pangkat' => 'Pembina',
                'jabatan' => 'Kepala Subbagian Perencanaan dan Evaluasi Sekretariat',
            ],
            [
                'nama' => 'Nur Ainun Ervina, S.E.',
                'nip' => '19840510 201001 2 019',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Subbagian Perencanaan dan Evaluasi Sekretariat'
            ],
            [
                'nama' => 'Esti Listyowati, SE, MM',
                'nip' => '19720927 199703 2 005',
                'tahun_kenaikan' => '2010',
                'golongan' => 'IV/a',
                'pangkat' => 'Pembina',
                'jabatan' => 'Kepala Bidang Warisan Budaya'
            ],
            [
                'nama' => 'Endah Kusuma Wardani, S.Ant',
                'nip' => '19820823 200804 2 003',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Kepala Seksi Warisan Budaya Benda Bidang Warisan Budaya'
            ],
            [
                'nama' => 'Davit Sadri Husin',
                'nip' => '19790904 200701 1 009',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Pengolah Data dan Informasi Warisan Budaya pada Seksi Warisan Budaya Benda Bidang Warisan Budaya'
            ],
            [
                'nama' => 'Dekhi Nugroho, SE, M.Ec.Dev',
                'nip' => '19721230 199703 1 005',
                'tahun_kenaikan' => '2010',
                'golongan' => 'IV/a',
                'pangkat' => 'Pembina',
                'jabatan' => 'Kepala Seksi Warisan Budaya Tak Benda Bidang Warisan Budaya'
            ],
            [
                'nama' => 'Qoswan Indraprastanti Pramudian Nugroho',
                'nip' => '19930911 202012 2 005',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/a',
                'pangkat' => 'Penata Muda',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Seksi Warisan Budaya Tak Benda Bidang Warisan Budaya'
            ],
            [
                'nama' => 'Ignatius Eko Ferianto, S.Sn., M.E',
                'nip' => '19730225 200003 1 001',
                'tahun_kenaikan' => '2010',
                'golongan' => 'IV/a',
                'pangkat' => 'Pembina',
                'jabatan' => 'Kepala Bidang Adat, Tradisi, Lembaga Budaya dan Seni (Bidang ATLAS)'
            ],
            [
                'nama' => 'Yohanes Jasminto, S.Pd',
                'nip' => '19661211 198912 1 002',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/b',
                'pangkat' => 'Penata Muda Tingkat I',
                'jabatan' => 'Kepala Seksi Adat dan Tradisi'
            ],
            [
                'nama' => 'Gregorius Khrisna Wicaksono, S.S',
                'nip' => '19801106 200903 1 001',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Penelaah Teknis Kebijakan Pada Seksi Adat dan Tradisi Bidang ATLAS'
            ],
            [
                'nama' => 'Heri Nur Susanto',
                'nip' => '19840724 200901 1 004',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Pengolah Data dan Informasi pada Seksi Adat dan Tradisi Bidang ATLAS'
            ],
            [
                'nama' => 'Suwarsi, S.Sn',
                'nip' => '19710528 200801 2 009',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/a',
                'pangkat' => 'Penata Muda',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Seksi Lembaga Budaya Bidang ATLAS'
            ],
            [
                'nama' => 'Sidiq Rokhmadi',
                'nip' => '19780804 200901 1 002',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/b',
                'pangkat' => 'Penata Muda Tingkat I',
                'jabatan' => 'Pengadministrasi Perkantoran Seksi Lembaga Budaya Bidang ATLAS'
            ],
            [
                'nama' => 'Arief Bowolaksono, S.Sn',
                'nip' => '19680901 199403 1 007',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Kepala Seksi Seni Bidang ATLAS'
            ],
            [
                'nama' => 'Anas Mubakkir, SS',
                'nip' => '19670429 199903 1 002',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Kepala Bidang Sejarah, Bahasa, Sastra dan Permuseuman (Bidang SBSP)'
            ],
            [
                'nama' => 'Mei Hartini, SS',
                'nip' => '19760511 201001 2 006',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Kepala Seksi Sejarah dan Permuseuman Bidang SBSP'
            ],
            [
                'nama' => 'Ruslaini, SS',
                'nip' => '19660704 199903 2 003',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/d',
                'pangkat' => 'Penata Tingkat I',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Seksi Sejarah dan Permuseuman Bidang SBSP'
            ],
            [
                'nama' => 'Ita Kurniawati, S.IP., MPA',
                'nip' => '19730527 200604 2003',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/c',
                'pangkat' => 'Penata',
                'jabatan' => 'Kepala Seksi Bahasa dan Sastra Bidang SBSP'
            ],
            [
                'nama' => 'Eko Widodo, SH',
                'nip' => '19741007 200701 1 009',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/a',
                'pangkat' => 'Penata Muda',
                'jabatan' => 'Penelaah Teknis Kebijakan pada Seksi Bahasa dan Sastra Bidang SBSP'
            ],
            [
                'nama' => 'Imam Muslikh Mahmudi, SIP',
                'nip' => '19800130 201101 1 005',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/c',
                'pangkat' => 'Penata',
                'jabatan' => 'Kepala UPTD Museum Gunungapi Merapi'
            ],
            [
                'nama' => 'Rini Setyawati, A.Md.',
                'nip' => '19740201 199303 2 002',
                'tahun_kenaikan' => '2010',
                'golongan' => 'III/c',
                'pangkat' => 'Penata',
                'jabatan' => 'Kepala Subbagian Tata Usaha UPTD Museum Gunungapi Merapi'
            ],
            [
                'nama' => 'Sumarji',
                'nip' => '19670813 200701 1 014',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/d',
                'pangkat' => 'Pengatur Tingkat I',
                'jabatan' => 'Operator Layanan Operasional pada Subbagian Tata Usaha UPTD Museum Gunungapi Merapi'
            ],
            [
                'nama' => 'Suraji',
                'nip' => '19760912 200701 1 009',
                'tahun_kenaikan' => '2010',
                'golongan' => 'II/c',
                'pangkat' => 'Pengatur',
                'jabatan' => 'Pengelola Layanan Operasional pada Subbagian Tata Usaha UPTD MGM'
            ],
            [
                'nama' => 'Maryana',
                'nip' => '19780219 200901 1 005',
                'tahun_kenaikan' => '2010',
                'golongan' => 'I/d',
                'pangkat' => 'Juru Tingkat I',
                'jabatan' => 'Pengadministrasi Perkantoran pada Subbagian Tata Usaha UPTD Museum Gunungapi Merapi'
            ],
        ]);
    }
}