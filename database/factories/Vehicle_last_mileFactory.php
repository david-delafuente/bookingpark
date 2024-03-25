<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle_last_mile>
 */
class Vehicle_last_mileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parking_id' => fake()->numberBetween(1, 25),
            'type' => fake()->randomElement(['bicicleta', 'patinete']),
        ];
    }
}
