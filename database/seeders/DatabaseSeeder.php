<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Library Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin' // Set as admin
        ]);

        // Seed normal users
        User::factory()->count(10)->create(['role' => 'user']);
    }
}
