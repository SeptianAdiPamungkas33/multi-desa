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
        $footer = Footer::create([
            'alamat' => 'Matesih, Matesih, Karanganyar',
            'sosmed' => 'sosmed',
            'email' => 'email',
            'no_telepon' => 'no_telepon',
            'jadwal1' => 'jadwal1',
            'jadwal2' => 'jadwal2',
            'jadwal3' => 'jadwal3',
            'link_terkait1' => 'link_terkait1',
            'link_terkait2' => 'link_terkait2',
            'link_terkait3' => 'link_terkait3',
            'link_url1' => 'link_url1',
            'link_url2' => 'link_url2',
            'link_url3' => 'link_url3',
            'navbar_color' => 'bg-blue-500',
            'website_id' => 1,
        ]);

        $footer = Footer::create([
            'alamat' => 'Ngadiluwih, Matesih, Karanganyar',
            'sosmed' => 'sosmed',
            'email' => 'email',
            'no_telepon' => 'no_telepon',
            'jadwal1' => 'jadwal1',
            'jadwal2' => 'jadwal2',
            'jadwal3' => 'jadwal3',
            'link_terkait1' => 'link_terkait1',
            'link_terkait2' => 'link_terkait2',
            'link_terkait3' => 'link_terkait3',
            'link_url1' => 'link_url1',
            'link_url2' => 'link_url2',
            'link_url3' => 'link_url3',
            'navbar_color' => 'bg-blue-500',
            'website_id' => 2,
        ]);

        $footer = Footer::create([
            'alamat' => 'Jumantono, Matesih, Karanganyar',
            'sosmed' => 'sosmed',
            'email' => 'email',
            'no_telepon' => 'no_telepon',
            'jadwal1' => 'jadwal1',
            'jadwal2' => 'jadwal2',
            'jadwal3' => 'jadwal3',
            'link_terkait1' => 'link_terkait1',
            'link_terkait2' => 'link_terkait2',
            'link_terkait3' => 'link_terkait3',
            'link_url1' => 'link_url1',
            'link_url2' => 'link_url2',
            'link_url3' => 'link_url3',
            'navbar_color' => 'bg-blue-500',
            'website_id' => 3,
        ]);

        // Footer::Create([
        //     'alamat' => 'Matesih, Matesih, Karanganyar',
        //     'sosmed' => 'Facebook, Instagram, Twitter',
        //     'jadwal1' => '08:00-16.00',
        //     'jadwal2' => '07:30-12.00',
        //     'jadwal3' => 'Libur',
        //     'link_terkait1' => 'Unduh Aplikasi',
        //     'link_terkait2' => 'Pengaduan',
        //     'link_terkait3' => 'Kabupaten Karanganyar',
        //     'website_id' => '1'
        // ]);

        // Footer::Create([
        //     'alamat' => 'Ngadiluwih, Matesih, Karanganyar',
        //     'sosmed' => 'Facebook, Instagram, Twitter',
        //     'jadwal1' => '08:00-16.00',
        //     'jadwal2' => '07:30-12.00',
        //     'jadwal3' => 'Libur',
        //     'link_terkait1' => 'Unduh Aplikasi',
        //     'link_terkait2' => 'Pengaduan',
        //     'link_terkait3' => 'Kabupaten Karanganyar',
        //     'website_id' => '2'
        // ]);

        // Footer::Create([
        //     'alamat' => 'Plosorejo, Matesih, Karanganyar',
        //     'sosmed' => 'Facebook, Instagram, Twitter',
        //     'jadwal1' => '08:00-16.00',
        //     'jadwal2' => '07:30-12.00',
        //     'jadwal3' => 'Libur',
        //     'link_terkait1' => 'Unduh Aplikasi',
        //     'link_terkait2' => 'Pengaduan',
        //     'link_terkait3' => 'Kabupaten Karanganyar',
        //     'website_id' => '3'
        // ]);
    }
}
