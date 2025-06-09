<?php

namespace App\Livewire\Board;

use App\Models\Card;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateCardForm extends Component
{
    use Toast;
    public $title = '';
    public $column_id;
    public $description = '';
    public $due_date;
    public $assignees = [];
    public $board;

    public function mount()
    {
        $this->column_id = $this->board->columns()->first()->id ?? null;
    }

    public function createCard()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date',
            'column_id' => 'required|exists:columns,id',
            'assignees' => 'required|array',
            'assignees.*' => 'exists:users,id',
        ]);

        $card = Card::create([
            'title' => $this->title,
            'column_id' => $this->column_id,
            'due_date' => $this->due_date,
            'description' => $this->description,
            'position' => Card::where('column_id', $this->column_id)->count() + 1,
        ]);

        $card->assignees()->sync($this->assignees);

        $this->success('Card added successfully!');
        $this->dispatch('refresh-board');
    }

    public function render()
    {
        $columns = $this->board->columns;
        $assignableUsers = $this->board->team->allUsers();
        return view('board.create-card-form', compact('columns', 'assignableUsers'));
    }
}
