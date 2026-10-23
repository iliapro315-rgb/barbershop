<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MasterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstName('male'),
            'specialization' => fake()->randomElement([
                'Классические стрижки',
                'Бороды и укладки',
                'Современные стрижки',
                'Детские стрижки',
            ]),
        ];
    }
}