<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Board::all()->each(function ($board) {
            Column::insert([
                ['name' => 'Completed', 'position' => 0, 'board_id' => $board->id],
                ['name' => 'On Going', 'position' => 1, 'board_id' => $board->id],
                ['name' => 'Upcoming', 'position' => 2, 'board_id' => $board->id],
            ]);
        });
    }
}
