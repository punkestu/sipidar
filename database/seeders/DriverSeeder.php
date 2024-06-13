<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create([
            'picture' => 'https://via.placeholder.com/150',
            'name' => 'John Doe',
            'phone' => '081234567890',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
        Driver::create([
            'picture' => 'https://via.placeholder.com/150',
            'name' => 'Jane Doe',
            'phone' => '081234567891',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
        Driver::create([
            'picture' => 'https://via.placeholder.com/150',
            'name' => 'John Smith',
            'phone' => '081234567892',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
    }
}
