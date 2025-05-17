<?php

namespace App\Livewire\Board;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use Livewire\Component;

class BoardView extends Component
{
    public Board $board;
    public $columns;

    protected $listeners = [
        'updateCardPositions',
        'updateColumnPositions',
    ];

    public function mount(Board $board)
    {
        $this->board = $board;
        $this->loadColumns();
    }

    public function loadColumns()
    {
        $this->columns = $this->board->columns()->with('cards')->get()->sortBy('position')->values();
    }

    public function updateCardPositions($columnId, $orderedCardIds)
    {
        foreach ($orderedCardIds as $position => $cardId) {
            Card::where('id', $cardId)->update(['position' => $position, 'column_id' => $columnId]);
        }
        $this->loadColumns();
    }

    public function updateColumnPositions($orderedColumnIds)
    {
        foreach ($orderedColumnIds as $position => $columnId) {
            Column::where('id', $columnId)->update(['position' => $position]);
        }
        $this->loadColumns();
    }
    public function render()
    {
        return view('board.board-view');
    }
}
