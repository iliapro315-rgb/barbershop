<?php

namespace Database\Factories;

use App\Models\Master;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Мужская стрижка',
                'Стрижка + борода',
                'Детская стрижка',
                'Укладка',
                'Камуфляж седины',
                'Королевское бритьё',
            ]),
            'description' => fake()->sentence(12),
            'price' => fake()->numberBetween(2000, 8000),
            'duration' => fake()->randomElement([25, 30, 40, 45, 60]),
            'master_id' => Master::factory(),
            'is_available' => fake()->boolean(80),
        ];
    }
}