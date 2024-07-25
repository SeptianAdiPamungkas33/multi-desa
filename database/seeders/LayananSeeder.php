<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanan = Layanan::create([
            'judul1' => 'Judul',
            'deskripsi1' => 'Deskripsi',
            'gambar1' => 'gambar',
            'judul2' => 'Judul',
            'deskripsi2' => 'Deskripsi',
            'gambar2' => 'gambar',
            'judul3' => 'Judul',
            'deskripsi3' => 'Deskripsi',
            'gambar3' => 'gambar',
            'website_id' => 1,
        ]);

        $layanan = Layanan::create([
            'judul1' => 'Judul',
            'deskripsi1' => 'Deskripsi',
            'gambar1' => 'gambar',
            'judul2' => 'Judul',
            'deskripsi2' => 'Deskripsi',
            'gambar2' => 'gambar',
            'judul3' => 'Judul',
            'deskripsi3' => 'Deskripsi',
            'gambar3' => 'gambar',
            'website_id' => 2,
        ]);

        $layanan = Layanan::create([
            'judul1' => 'Judul',
            'deskripsi1' => 'Deskripsi',
            'gambar1' => 'gambar',
            'judul2' => 'Judul',
            'deskripsi2' => 'Deskripsi',
            'gambar2' => 'gambar',
            'judul3' => 'Judul',
            'deskripsi3' => 'Deskripsi',
            'gambar3' => 'gambar',
            'website_id' => 3,
        ]);
    }
}
