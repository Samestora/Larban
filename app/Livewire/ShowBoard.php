<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowBoard extends Component
{
    public Board $board;
    public $columns;

    protected $listeners = [
        'updateCardPositions',
        'updateColumnPositions',
    ];

    public function mount(Board $board)
    {
        /**  @var App\Model\User */
        $user = Auth::user();
        if (!$user->can('view', $board)) {
            abort(403);
        }
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

    // column or card Creation Update or Deletion
    #[\Livewire\Attributes\On('refresh-board')]
    public function refreshBoard()
    {
        $this->board->load('columns.cards');
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

        return view('board.show');
    }
}
