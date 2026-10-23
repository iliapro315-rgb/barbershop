<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'title' => 'Мужская стрижка',
                'description' => 'Классическая стрижка машинкой и ножницами',
                'price' => 4000,
                'duration' => 40,
                'master_id' => 1,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Стрижка + борода',
                'description' => 'Комплекс: стрижка и оформление бороды',
                'price' => 6500,
                'duration' => 60,
                'master_id' => 2,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Детская стрижка',
                'description' => 'Стрижка для детей до 12 лет',
                'price' => 3000,
                'duration' => 30,
                'master_id' => 1,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Укладка',
                'description' => 'Укладка волос с профессиональной косметикой',
                'price' => 2500,
                'duration' => 25,
                'master_id' => 3,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Камуфляж седины',
                'description' => 'Маскировка седых волос',
                'price' => 5500,
                'duration' => 45,
                'master_id' => 2,
                'is_available' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}