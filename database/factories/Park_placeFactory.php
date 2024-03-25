<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Park_place>
 */
class Park_placeFactory extends Factory
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
            'number' => fake()->numberBetween(1, 100),
            'size' => fake()->randomElement(['small', 'large']),
        ];
    }
}
