<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();
        $this->call([
            UserSeeder::class,
            BoardSeeder::class,
            ColumnSeeder::class,
            CardSeeder::class,
        ]);
    }
}
