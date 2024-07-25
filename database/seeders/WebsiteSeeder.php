<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Website::Create([
            'url' => 'matesih',
            'desa_id' => '1',
            'user_id' => '2',
        ]);
        Website::Create([
            'url' => 'ngadiluwih',
            'desa_id' => '2',
            'user_id' => '3',
        ]);
        Website::Create([
            'url' => 'jumantono',
            'desa_id' => '3',
            'user_id' => '4',
        ]);
    }
}
