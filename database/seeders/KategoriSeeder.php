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
        ]);

        Kategori::create([
            'nama' => 'Kesehatan',
        ]);

        Kategori::create([
            'nama' => 'Pariwisata',
        ]);

        Kategori::create([
            'nama' => 'Olahraga',
        ]);

        Kategori::create([
            'nama' => 'Budaya',
        ]);
    }
}
