<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'type' => 'Car',
            'model' => 'Toyota Corolla',
            'plate' => 'AB 1234 CD',
            'color' => 'Black',
            'picture' => 'https://via.placeholder.com/150',
            'gas_consumption' => 10.5,
            'gas_tank' => 50,
            'service_date' => '2024-06-13',
            'service_every_in_day' => 30,
        ]);
        Vehicle::create([
            'type' => 'Car',
            'model' => 'Toyota Avanza',
            'plate' => 'AB 5678 CD',
            'color' => 'White',
            'picture' => 'https://via.placeholder.com/150',
            'gas_consumption' => 12.5,
            'gas_tank' => 60,
            'service_date' => '2024-06-13',
            'service_every_in_day' => 30,
        ]);
        Vehicle::create([
            'type' => 'Car',
            'model' => 'Toyota Innova',
            'plate' => 'AB 9012 CD',
            'color' => 'Silver',
            'picture' => 'https://via.placeholder.com/150',
            'gas_consumption' => 15.5,
            'gas_tank' => 70,
            'service_date' => '2024-06-13',
            'service_every_in_day' => 30,
        ]);
    }
}
