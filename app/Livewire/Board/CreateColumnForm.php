<?php

namespace App\Livewire\Board;

use App\Models\Board;
use Livewire\Component;

class CreateColumnForm extends Component
{

    public $board;
    public $name = '';

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount(Board $board)
    {
        $this->board = $board;
    }

    public function createColumn()
    {
        $this->validate();

        $this->board->columns()->create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->emit('columnAdded'); // for potential reactivity
    }

    public function render()
    {
        return view('board.create-column-form');
    }
}
