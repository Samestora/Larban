<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Column;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        Column::all()->each(function ($column) use ($users) {
            Card::factory(5)->create([
                'column_id' => $column->id,
            ])->each(function ($card) use ($users) {
                // Assign random users to each card
                $card->assignees()->attach(
                    $users->random(rand(1, 2))->pluck('id')->toArray()
                );
            });
        });
    }
}
