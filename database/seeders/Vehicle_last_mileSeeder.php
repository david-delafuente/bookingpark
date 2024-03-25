<?php

namespace Database\Seeders;

use App\Models\Vehicle_last_mile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Vehicle_last_mileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle_last_mile::factory()->count(250)->create();
    }
}
