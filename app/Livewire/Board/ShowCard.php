<?php

namespace App\Livewire\Board;

use App\Livewire\ShowBoard;
use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
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
    public array $assignees = [];
    public ?int $column_id = null;

    protected $listeners = ['show-card-detail' => 'loadCard'];

    public function updateCard()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'assignees' => 'nullable|array',
            'assignees.*' => 'exists:users,id',
        ]);

        $this->card->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'] ?? null,
            'due_date' => $validatedData['due_date'] ?? null,
        ]);

        // Sync assignees
        $this->card->assignees()->sync($validatedData['assignees'] ?? []);

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

        $this->title = $this->card->title;
        $this->description = $this->card->description;
        $this->due_date = $this->card->due_date ? Carbon::parse($this->card->due_date)->format('Y-m-d') : null;

        $this->assignees = $this->card->assignees()->pluck('id')->toArray();

        $this->column_id = $this->card->column_id;

        $this->showCardDetail = true;
        $this->editing = false;
    }




    public function render()
    {
        if (!$this->column_id) {
            return view('board.show-card', ['assignableUsers' => []]);
        }

        $column = Column::findOrFail($this->column_id);
        $board = $column->board;

        $assignableUsers = $board->team->allUsers();

        return view('board.show-card', compact('assignableUsers'));
    }
}
