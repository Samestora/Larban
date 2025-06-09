<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class CreateBoardsForm extends Component
{
    use Toast;
    use WithFileUploads;

    public $name;
    public $description;
    public $thumbnail_path;
    public $team_id;
    public bool $resetPreview = false;

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $this->team_id = $user->allTeams()->first()->id ?? null;
    }

    public function createBoards()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_path' => 'nullable|image|max:2048', // 2MB max
            'team_id' => 'required|integer|exists:teams,id',
        ]);

        if ($this->thumbnail_path) {
            $path = $this->thumbnail_path->store('boards', 'public');

            $newBoard = Board::create([
                'name' => $this->name,
                'description' => $this->description,
                'thumbnail_path' => $path,
                'team_id' => $this->team_id,
            ]);
        } else {
            $newBoard = Board::create([
                'name' => $this->name,
                'description' => $this->description,
                'team_id' => $this->team_id,
            ]);
        }

        Column::create([
            'name' => 'Completed',
            'position' => 0,
            'board_id' => $newBoard->id,
        ]);

        Column::create([
            'name' => 'On Going',
            'position' => 1,
            'board_id' => $newBoard->id,
        ]);

        Column::create([
            'name' => 'Upcoming',
            'position' => 2,
            'board_id' => $newBoard->id,
        ]);


        $this->reset(['name', 'description', 'thumbnail_path', 'team_id']);
        $this->success('Board added successfully!');
        $this->resetPreview = true;
        $this->dispatch('refresh-board');
    }

    public function render()
    {
        return view('boards.create-boards-form');
    }
}
