<?php

namespace Database\Seeders;

use App\Models\Desa;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desa::Create([
            'nama' => 'Matesih',
            'alamat' => 'Matesih, Matesih, Karanganyar',
            'no_telp' => '0884761821891',
        ]);

        Desa::Create([
            'nama' => 'Ngadiluwih',
            'alamat' => 'Ngadiluwih, Matesih, Karanganyar',
            'no_telp' => '081412112112524',
        ]);

        Desa::Create([
            'nama' => 'Jumantono',
            'alamat' => 'Jumantono, Matesih, Karanganyar',
            'no_telp' => '0876151121254',
        ]);
    }
}
