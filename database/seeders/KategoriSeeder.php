<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama' => 'Pendidikan',
            'website_id' => 1,
        ]);

        Kategori::create([
            'nama' => 'Kesehatan',
            'website_id' => 1,
        ]);

        Kategori::create([
            'nama' => 'Pariwisata',
            'website_id' => 1,
        ]);

        Kategori::create([
            'nama' => 'Olahraga',
            'website_id' => 1,
        ]);

        Kategori::create([
            'nama' => 'Budaya',
            'website_id' => 1,
        ]);
    }
}
