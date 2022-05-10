<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
           'title' => json_encode([
               'title_uz' => 'title',
               'title_ru' => 'title_ru'
           ]),
           'image' => 'path/image.png' 
        ]);
        Banner::create([
           'title' => json_encode([
               'title_uz' => 'title',
               'title_ru' => 'title_ru'
           ]),
           'image' => 'path/image.png' 
        ]);
    }
}
