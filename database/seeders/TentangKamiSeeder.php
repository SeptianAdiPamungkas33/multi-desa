<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tentangkami;

class TentangKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tentangkami = Tentangkami::create([
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'img/default.png',
            'website_id' => 1,
        ]);

        $tentangkami = Tentangkami::create([
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'img/default.png',
            'website_id' => 2,
        ]);

        $tentangkami = Tentangkami::create([
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'img/default.png',
            'website_id' => 3,
        ]);
    }
}
