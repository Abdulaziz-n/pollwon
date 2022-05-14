<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\AboutUsPictureSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
           //UserSeeder::class,
           // BannerSeeder::class,
           // AboutUsPictureSeeder::class
            SettingsSeeder::class
        ]);
    }
}
