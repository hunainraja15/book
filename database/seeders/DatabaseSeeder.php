<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'role' => 'user',
            'password' => Hash::make('12345678'),
        ]);
    }
}
