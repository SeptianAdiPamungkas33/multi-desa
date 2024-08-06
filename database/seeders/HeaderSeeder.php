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
        $header = Header::create([
            'title' => 'Matesih',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Galeri',
            'nama_menu5' => 'Artikel',
            'nama_menu6' => 'Chart',
            'image' => 'img/default.png',
            'navbar_color' => 'bg-blue-500',
            'website_id' => 1,
        ]);

        $header = Header::create([
            'title' => 'Ngadiluwih',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Artikel',
            'nama_menu5' => 'Galeri',
            'nama_menu6' => 'Chart',
            'image' => 'img/default.png',
            'navbar_color' => 'bg-blue-500',
            'website_id' => 2,
        ]);

        $header = Header::create([
            'title' => 'Plosorejo',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Artikel',
            'nama_menu5' => 'Galeri',
            'nama_menu6' => 'Chart',
            'image' => 'img/default.png',
            'navbar_color' => 'bg-blue-500',
            'website_id' => 3,
        ]);
    }
}
