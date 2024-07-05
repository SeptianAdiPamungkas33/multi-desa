<?php

namespace Database\Seeders;

use App\Models\postingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Postingan::create([
            'judul' => 'Pendidikan di Indonesia',
            'isi' => 'Pendidikan di Indonesia sangat penting untuk meningkatkan kualitas sumber daya manusia.',
            'kategori_id' => '1',
            'desa_id' => '1',
            'website_id' => '1',
        ]);

        Postingan::create([
            'judul' => 'Kesehatan di Indonesia',
            'isi' => 'Kesehatan di Indonesia sangat penting untuk meningkatkan kualitas sumber daya manusia.',
            'kategori_id' => '2',
            'desa_id' => '2',
            'website_id' => '1',
        ]);

        Postingan::create([
            'judul' => 'Pariwisata di Indonesia',
            'isi' => 'Pariwisata di Indonesia sangat penting untuk meningkatkan kualitas sumber daya manusia.',
            'kategori_id' => '3',
            'desa_id' => '3',
            'website_id' => '1',
        ]);

        Postingan::create([
            'judul' => 'Olahraga di Indonesia',
            'isi' => 'Olahraga di Indonesia sangat penting untuk meningkatkan kualitas sumber daya manusia.',
            'kategori_id' => '4',
            'desa_id' => '1',
            'website_id' => '1',
        ]);

        Postingan::create([
            'judul' => 'Budaya di Indonesia',
            'isi' => 'Budaya di Indonesia sangat penting untuk meningkatkan kualitas sumber daya manusia.',
            'kategori_id' => '5',
            'desa_id' => '2',
            'website_id' => '1',
        ]);
    }
}
