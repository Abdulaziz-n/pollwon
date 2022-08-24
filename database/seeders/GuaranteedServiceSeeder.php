<?php

namespace Database\Seeders;

use App\Models\GuaranteedService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuaranteedServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuaranteedService::query()->create([
           'title' => 'test',
           'subtitle' => 'subtitle',
           'description' => 'description',
           'image' => 'path/image.png'
        ]);
    }
}
