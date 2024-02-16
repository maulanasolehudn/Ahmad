<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Contoh menggunakan Query Builder
        User::create([
            'name' => 'maudi',
            'email' => 'maudi@gmail.com',
            'password' => bcrypt('maudi1234'),
        ]);

        // Atau contoh menggunakan model Eloquent
        User::create([
            'name' => 'rahma',
            'email' => 'rahma@gmail.com',
            'password' => bcrypt('rahma1234'),
        ]);
    }
}
