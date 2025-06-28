<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // default password
            ]
        );

        // Panggil juga ProductSeeder kalau kamu punya:
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
