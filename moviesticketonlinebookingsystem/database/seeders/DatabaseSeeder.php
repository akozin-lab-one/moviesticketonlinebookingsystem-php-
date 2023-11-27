<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'confirm_password' => Hash::make('admin123')
        ]);

        \App\Models\Status::factory()->create([
            'name' => 'current', // Customize the values as needed
        ]);

        \App\Models\Status::factory()->create([
            'name' => 'upcoming',
            // Add other attributes as needed
        ]);

    }
}
