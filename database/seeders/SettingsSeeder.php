<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'shop' => json_encode('test'),
            'social' => json_encode('social'),
            'office' => json_encode('office'),
            'link' => 'https://maps.com',
            'file' => 'path/file.pdf'
        ]);
    }
}
