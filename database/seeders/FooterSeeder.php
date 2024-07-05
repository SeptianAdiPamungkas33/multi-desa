<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Footer::Create([
            'alamat' => 'Matesih, Matesih, Karanganyar',
            'sosmed' => 'Facebook, Instagram, Twitter',
            'jadwal1' => '08:00-16.00',
            'jadwal2' => '07:30-12.00',
            'jadwal3' => 'Libur',
            'link_terkait1' => 'Unduh Aplikasi',
            'link_terkait2' => 'Pengaduan',
            'link_terkait3' => 'Kabupaten Karanganyar',
            'website_id' => '1'
        ]);

        Footer::Create([
            'alamat' => 'Ngadiluwih, Matesih, Karanganyar',
            'sosmed' => 'Facebook, Instagram, Twitter',
            'jadwal1' => '08:00-16.00',
            'jadwal2' => '07:30-12.00',
            'jadwal3' => 'Libur',
            'link_terkait1' => 'Unduh Aplikasi',
            'link_terkait2' => 'Pengaduan',
            'link_terkait3' => 'Kabupaten Karanganyar',
            'website_id' => '2'
        ]);

        Footer::Create([
            'alamat' => 'Plosorejo, Matesih, Karanganyar',
            'sosmed' => 'Facebook, Instagram, Twitter',
            'jadwal1' => '08:00-16.00',
            'jadwal2' => '07:30-12.00',
            'jadwal3' => 'Libur',
            'link_terkait1' => 'Unduh Aplikasi',
            'link_terkait2' => 'Pengaduan',
            'link_terkait3' => 'Kabupaten Karanganyar',
            'website_id' => '3'
        ]);
    }
}
