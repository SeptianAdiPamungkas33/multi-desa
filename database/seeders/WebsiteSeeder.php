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
            'url' => 'Website Matesih',
            'desa_id' => '1',
        ]);
        Website::Create([
            'nama' => 'Website Ngadiluwih',
            'desa_id' => '2',
        ]);
        Website::Create([
            'nama' => 'Website Plosorejo',
            'desa_id' => '3',
        ]);
    }
}
