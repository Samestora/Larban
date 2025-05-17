<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::all()->each(function ($team) {
            Board::factory(2)->create([
                'team_id' => $team->id,
            ]);
        });
    }
}
