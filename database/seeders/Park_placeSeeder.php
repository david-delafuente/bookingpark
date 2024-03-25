<?php

namespace Database\Seeders;

use App\Models\Park_place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Park_placeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Park_place::factory()->count(200)->create();
    }
}
