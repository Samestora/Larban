<?php

namespace App\Livewire\Board;

use App\Livewire\ShowBoard;
use App\Models\Board;
use App\Models\Card;
use Carbon\Carbon;
use Livewire\Component;
use Mary\Traits\Toast;

class ShowCard extends Component
{
    use Toast;
    public bool $showCardDetail = false;
    public bool $editing = false;
    public ?Card $card = null;
    public $title = null;
    public $description = null;
    public $due_date = null;

    protected $listeners = ['show-card-detail' => 'loadCard'];

    public function updateCard()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $this->card->update($validatedData);

        $this->editing = false;
        $this->success('Card modified successfully!');
        $this->dispatch('refresh-board');
    }

    public function deleteCard()
    {
        if (!$this->card) {
            $this->error('No card selected for deletion.', 'Error');
            return;
        }

        $columnId = $this->card->column_id;
        $cardId = $this->card->id;

        $this->card->delete();

        $this->dispatch('cardDelete', $cardId, $columnId)->to(ShowBoard::class);

        // Emit an event to inform other components that the card has been deleted
        // Pass both card ID and column ID so the receiving component knows which column to update

        $this->showCardDetail = false; // Close the modal
        $this->card = null; // Clear the card property
        $this->success('Card deleted successfully!');
        $this->dispatch('refresh-board');
    }

    public function loadCard(int $id)
    {
        $this->card = Card::findOrFail($id);

        if ($this->card) {
            $this->title = $this->card->title;
            $this->description = $this->card->description;
            $this->due_date = $this->card->due_date ? Carbon::parse($this->card->due_date)->format('Y-m-d') : null;
        } else {
            // Handle case where card is not found, e.g., redirect or show an error
            $this->dispatch('error', title: 'Card not found!');
            $this->showCardDetail = false;
            return;
        }

        $this->showCardDetail = true;
        $this->editing = false;
    }


    public function render()
    {
        return view('board.show-card');
    }
}
