<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//           'name' => 'admin',
//           'email' => 'admin@admin.com',
//           'password' => bcrypt('123456'),
//
//        ]);
        User::create([
           'name' => 'Manager Pollwon',
           'email' => 'manager@pollwon.uz',
           'role' => 'manager',
           'password' => bcrypt('x5u6dXZb23'),

        ]);
    }
}
