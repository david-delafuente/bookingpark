<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create(
            [
                'name' => 'Ciutat Vella',
                'zip_code' => '08001',
            ]
        );

        District::create(
            [
                'name' => 'Eixample',
                'zip_code' => '08009',
            ]
        );

        District::create(
            [
                'name' => 'Sants-Montjuic',
                'zip_code' => '08038',
            ]
        );

        District::create(
            [
                'name' => 'Les Corts',
                'zip_code' => '08028',
            ]
        );

        District::create(
            [
                'name' => 'Sarrià-Sant Gervasi',
                'zip_code' => '08022',
            ]
        );

        District::create(
            [
                'name' => 'Gràcia',
                'zip_code' => '08012',
            ]
        );

        District::create(
            [
                'name' => 'Horta-Guinardó',
                'zip_code' => '08024',
            ]
        );

        District::create(
            [
                'name' => 'Nou Barris',
                'zip_code' => '08042',
            ]
        );

        District::create(
            [
                'name' => 'Sant Andreu',
                'zip_code' => '08030',
            ]
        );

        District::create(
            [
                'name' => 'Sant Martí',
                'zip_code' => '08001',
            ]
        );
    }
}
