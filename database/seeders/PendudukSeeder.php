<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penduduk = Penduduk::create([
            'laki' => '1000',
            'perempuan' => '1000',
            'total_penduduk' => '2000',
            'persen_laki' => '50.00',
            'persen_perempuan' => '50.00',
            'website_id' => 1,
            'desa_id' => '3313050003',
            'nama_desa' => 'MATESIH',
            'kecamatan_id' => '3313050',
            'nama_kecamatan' => 'MATESIH',
        ]);

        $penduduk = Penduduk::create([
            'laki' => '1000',
            'perempuan' => '1000',
            'total_penduduk' => '2000',
            'persen_laki' => '50.00',
            'persen_perempuan' => '50.00',
            'website_id' => 2,
            'desa_id' => '3313050001',
            'nama_desa' => 'NGADILUWIH',
            'kecamatan_id' => '3313050',
            'nama_kecamatan' => 'MATESIH',
        ]);

        $penduduk = Penduduk::create([
            'laki' => '1000',
            'perempuan' => '1000',
            'total_penduduk' => '2000',
            'persen_laki' => '50.00',
            'persen_perempuan' => '50.00',
            'website_id' => 3,
            'desa_id' => '3313050008',
            'nama_desa' => 'PLOSOREJO',
            'kecamatan_id' => '3313050',
            'nama_kecamatan' => 'MATESIH',
        ]);
    }
}
