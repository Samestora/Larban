<?php

namespace App\Livewire\Board;

use Livewire\Component;

class BoardColumns extends Component
{
    public $board;

    public function render()
    {
        $columns = $this->board->columns()->with('cards')->orderBy('position')->get();
        return view('board.board-columns', compact('columns'));
    }
}
