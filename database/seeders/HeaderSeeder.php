<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Header::Create([
        //     'title' => 'Website Matesih',
        //     'nama_menu1' => 'Beranda',
        //     'nama_menu2' => 'About US',
        //     'nama_menu3' => 'Layanan',
        //     'nama_menu4' => 'Artikel',
        //     'nama_menu5' => 'Galeri',
        //     'nama_menu6' => 'Potensi',
        //     'website_id' => '1',
        // ]);

        $header = Header::create([
            'title' => 'Matesih',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Galeri',
            'nama_menu5' => 'Artikel',
            'nama_menu6' => 'Potensi Desa',
            'image' => 'img/default.png',
            'website_id' => 1,
        ]);

        $header = Header::create([
            'title' => 'Ngadiluwih',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Artikel',
            'nama_menu5' => 'Galeri',
            'nama_menu6' => 'Potensi Desa',
            'image' => 'img/default.png',
            'website_id' => 2,
        ]);

        $header = Header::create([
            'title' => 'Jumantono',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Artikel',
            'nama_menu5' => 'Galeri',
            'nama_menu6' => 'Potensi Desa',
            'image' => 'img/default.png',
            'website_id' => 3,
        ]);
    }
}
