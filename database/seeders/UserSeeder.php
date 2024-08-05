<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'nomor_telepon' => '0884761821891',
            'role_id' => '1',
            // 'desa_id' => '1',
            // 'website_id' => '1',
            'password' => Hash::make('superadmin123'),
        ]);

        User::create([
            'username' => 'adminmatesih',
            'urllink' => 'matesih',
            'email' => 'matesih@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '2',
            'desa_id' => '3313050003',
            'nama_desa' => 'MATESIH',
            'kecamatan_id' => '3313050',
            'nama_kecamatan' => 'MATESIH',
            'password' => Hash::make('matesih12'),
        ]);

        User::create([
            'username' => 'adminngadiluwih',
            'urllink' => 'ngadiluwih',
            'email' => 'ngadiluwih@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '2',
            'desa_id' => '3313050001',
            'nama_desa' => 'NGADILUWIH',
            'kecamatan_id' => '3313050',
            'nama_kecamatan' => 'MATESIH',
            'password' => Hash::make('ngadiluwih12'),
        ]);

        User::create([
            'username' => 'adminplosorejo',
            'urllink' => 'plosorejo',
            'email' => 'plossorejo@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '2',
            'desa_id' => '3313050008',
            'nama_desa' => 'PLOSOREJO',
            'kecamatan_id' => '3313050',
            'nama_kecamatan' => 'MATESIH',
            'password' => Hash::make('plossorejo12'),
        ]);

        // User::create([
        //     'username' => 'penulismatesih12',
        //     'email' => 'penulismatesih12@gmail.com',
        //     'nomor_telepon' => '081412112112524',
        //     'role_id' => '4',
        //     'desa_id' => '1',
        //     'password' => Hash::make('penulismatesih12'),
        // ]);

        // User::create([
        //     'username' => 'penulisngadiluwih12',
        //     'email' => 'penulisngadiluwih12@gmail.com',
        //     'nomor_telepon' => '081412112112524',
        //     'role_id' => '4',
        //     'desa_id' => '2',
        //     'password' => Hash::make('penulisngadiluwih12'),
        // ]);

        // User::create([
        //     'username' => 'penulisjumantono12',
        //     'email' => 'penulisjumantono12@gmail.com',
        //     'nomor_telepon' => '081412112112524',
        //     'role_id' => '4',
        //     'desa_id' => '3',
        //     'password' => Hash::make('penulisjumantono12'),
        // ]);
    }
}
