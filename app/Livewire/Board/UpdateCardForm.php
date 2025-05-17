<?php

namespace App\Livewire\Board;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use Livewire\Component;

class UpdateCardForm extends Component
{
    public ?Card $card = null;
    public bool $show = false;

    protected $listeners = ['showCardDetail'];

    public function showCardDetail($id)
    {
        if (!$this->card || $this->card->id !== $id) {
            $this->card = Card::find($id);
        }

        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
        $this->card = null;
    }

    public function render()
    {
        return view('board.update-card-form');
    }
}
