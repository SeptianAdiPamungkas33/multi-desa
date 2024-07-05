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
            'desa_id' => '1',
            // 'website_id' => '1',
            'password' => Hash::make('superadmin123'),
            // 'instansi' => 'kominfo',
            // 'instansi_id' => '1',
        ]);
    }
}
