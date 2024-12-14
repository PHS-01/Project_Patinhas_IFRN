<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria um administrador padrão
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'type' => 'admin',
            'phone_number' => '(00) 00000-0000',
            'password' => Hash::make('123456789'),
        ]);

        User::factory(10)->create();
        Pet::factory(10)->create();
        Adoption::factory(10)->create();
    }
}
