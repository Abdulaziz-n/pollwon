<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUsPicture;

class AboutUsPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUsPicture::create([
           'position' => '1',
           'image' => 'path/image',
           'image_mobile' => 'path/imagem' 
        ]);
        AboutUsPicture::create([
           'position' => '2',
           'image' => 'path/image',
           'image_mobile' => 'path/imagem' 
        ]);
        AboutUsPicture::create([
           'position' => '3',
           'image' => 'path/image',
           'image_mobile' => 'path/imagem' 
        ]);
        AboutUsPicture::create([
           'position' => '4',
           'image' => 'path/image',
           'image_mobile' => 'path/imagem' 
        ]); 
    }
}
