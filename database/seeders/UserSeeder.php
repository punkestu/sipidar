<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        User::factory()->create([
            'name' => 'Officer A',
            'email' => 'officera@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Officer B',
            'email' => 'officerb@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Officer C',
            'email' => 'officerc@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 3,
        ]);
        User::factory()->create([
            'name' => 'Officer D',
            'email' => 'officerd@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 3,
        ]);
    }
}
