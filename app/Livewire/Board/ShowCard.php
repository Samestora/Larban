<?php

namespace App\Livewire\Board;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ShowCard extends Component
{
    public bool $show = false;
    public bool $editing = false;
    public ?Card $card = null;

    protected $listeners = ['card-selected' => 'loadCard'];

    public function loadCard(int $id)
    {
        $this->card = Card::findOrFail($id);
        $this->show = true;
        $this->editing = false;
    }

    public function updateCard()
    {
        $this->validate([
            'card.title' => 'required|string',
            'card.description' => 'nullable|string',
            'card.due_date' => 'nullable|date',
        ]);

        $this->card->save();
        $this->editing = false;
        $this->dispatch('card-updated', id: $this->card->id);
    }

    public function render()
    {
        return view('board.show-card');
    }
}
