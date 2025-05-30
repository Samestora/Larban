<?php

namespace App\Livewire\Board;

use App\Models\Board;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateColumnForm extends Component
{
    use Toast;
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
        $this->success('Column added successfully!');
        $this->dispatch('refresh-board');
    }


    public function render()
    {
        return view('board.create-column-form');
    }
}
