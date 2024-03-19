<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
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
            'id' => 1,
            'name' => 'User',
            'email' => 'user@example.com',
            'password'=> bcrypt('password'),
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> bcrypt('password'),
        ]);

        Note::factory(100)->create();
    }
}
