<?php

namespace App\Livewire\Board;

use Livewire\Component;

class BoardHeader extends Component
{
    public $board;

    public function render()
    {
        return view('board.board-header');
    }
}
