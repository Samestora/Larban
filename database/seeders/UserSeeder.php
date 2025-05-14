<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users =
            [[
                'name' => 'Unverified Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => null,
            ], [
                'name' => 'Verified Example User',
                'email' => 'testv@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]];
        foreach ($users as $user) {
            User::factory()->withPersonalTeam()->create(
                $user
            );
        }
    }
}
