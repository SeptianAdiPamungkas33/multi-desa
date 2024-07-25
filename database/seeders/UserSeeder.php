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
            'username' => 'matesih',
            'email' => 'matesih@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '2',
            'desa_id' => '1',
            'password' => Hash::make('matesih12'),
        ]);

        User::create([
            'username' => 'ngadiluwih',
            'email' => 'ngadiluwih@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '2',
            'desa_id' => '2',
            'password' => Hash::make('ngadiluwih12'),
        ]);

        User::create([
            'username' => 'jumantono',
            'email' => 'jumantono@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '2',
            'desa_id' => '3',
            'password' => Hash::make('jumantono12'),
        ]);

        User::create([
            'username' => 'penulismatesih12',
            'email' => 'penulismatesih12@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '4',
            'desa_id' => '1',
            'password' => Hash::make('penulismatesih12'),
        ]);

        User::create([
            'username' => 'penulisngadiluwih12',
            'email' => 'penulisngadiluwih12@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '4',
            'desa_id' => '2',
            'password' => Hash::make('penulisngadiluwih12'),
        ]);

        User::create([
            'username' => 'penulisjumantono12',
            'email' => 'penulisjumantono12@gmail.com',
            'nomor_telepon' => '081412112112524',
            'role_id' => '4',
            'desa_id' => '3',
            'password' => Hash::make('penulisjumantono12'),
        ]);
    }
}
