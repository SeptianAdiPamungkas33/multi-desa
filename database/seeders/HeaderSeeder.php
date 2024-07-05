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
        Header::Create([
            'title' => 'Website Matesih',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'About US',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Artikel',
            'nama_menu5' => 'Galeri',
            'nama_menu6' => 'Potensi',
            'website_id' => '1',
        ]);

        Header::Create([
            'title' => 'Website Ngadiluwih',
            'nama_menu1' => 'About',
            'nama_menu2' => 'Layanan',
            'nama_menu3' => 'Artikel',
            'nama_menu4' => 'Galeri',
            'nama_menu5' => 'Potensi',
            'nama_menu6' => 'Kontak',
            'website_id' => '2',
        ]);
    }
}
