<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Board;
use Mary\Traits\Toast;

class EditBoardForm extends Component
{
    use Toast, WithFileUploads;

    public $boardId;
    public $name;
    public $description;
    public $thumbnail_path;
    public $existingThumbnail;

    public function mount($boardId)
    {
        $board = Board::findOrFail($boardId);
        $this->boardId = $boardId;
        $this->name = $board->name;
        $this->description = $board->description;
        $this->existingThumbnail = $board->thumbnail_path;
    }

    public function updateBoard()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_path' => 'nullable|image|max:2048',
        ]);

        $board = Board::findOrFail($this->boardId);

        if ($this->thumbnail_path) {
            $path = $this->thumbnail_path->store('boards', 'public');
        } else {
            $path = $this->existingThumbnail;
        }

        $board->update([
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail_path' => $path,
        ]);

        $this->success('Board updated successfully!');
        $this->dispatch('refresh-board');
    }

    public function deleteBoard()
    {
        $board = Board::find($this->boardId);

        if (!$board) {
            $this->error('Board not found.', 'Error');
            return;
        }

        $board->delete();

        $this->success('Board deleted successfully!');
        $this->dispatch('refresh-board');
    }


    public function render()
    {
        return view('boards.edit-board-form');
    }
}
