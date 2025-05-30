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
    public $board;

    public function mount()
    {
        $this->column_id = $this->board->columns()->first()->id ?? null;
    }

    public function createCard()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'column_id' => 'required|exists:columns,id',
        ]);

        Card::create([
            'title' => $this->title,
            'column_id' => $this->column_id,
            'description' => $this->description,
            'position' => Card::where('column_id', $this->column_id)->count() + 1,
        ]);

        $this->success('Card added successfully!');
        $this->dispatch('refresh-board');
    }

    public function render()
    {
        $columns = $this->board->columns;
        return view('board.create-card-form', compact('columns'));
    }
}
