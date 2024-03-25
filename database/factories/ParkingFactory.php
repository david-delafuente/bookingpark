<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parking>
 */
class ParkingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('es_ES');
        $operatingInfo = fake()->randomElement(['24h', '12h']);
        $random_id = fake()->numberBetween(1, 10);
        return [
            'district_id' => $random_id,
            'name' => $faker->name(),
            'adress' => $faker->streetAddress(),
            'contact_info' => $faker->phoneNumber(),
            'operating_info' => $operatingInfo,
        ];
    }
}
