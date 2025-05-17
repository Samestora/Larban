<?php

namespace App\Livewire\Board;

use App\Models\Card;
use Livewire\Component;

class CreateCardForm extends Component
{
    public $board;
    public $title = '';
    public $column_id;

    public function mount()
    {
        $this->column_id = $this->board->columns()->first()->id ?? null;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'column_id' => 'required|exists:columns,id'
        ]);

        Card::create([
            'title' => $this->title,
            'column_id' => $this->column_id,
            'position' => Card::where('column_id', $this->column_id)->count() + 1
        ]);

        $this->reset(['title']);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $columns = $this->board->columns;
        return view('board.create-card-form', compact('columns'));
    }
}
