<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'service_id' => Service::inRandomOrder()->first()?->id ?? 1,
            'client_name' => $this->faker->name(),
            'client_phone' => $this->faker->phoneNumber(),
            'booking_date' => $this->faker->dateTimeBetween('now', '+7 days'),
            'status' => 'new',
        ];
    }
}