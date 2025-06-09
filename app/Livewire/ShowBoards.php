<?php

namespace App\Livewire;

use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class ShowBoards extends Component
{
    public $boards;
    public $teams;
    public $breadcrumbs;

    public function loadBoards(): void
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        // Get all teams the user belongs to
        $this->teams = $user->allTeams();

        // Get all boards that belong to any of the user's teams
        $teamIds = $user->allTeams()->pluck('id');
        $this->breadcrumbs = [
            ['icon' => 's-home', 'link' => route('dashboard')],
            ['label' => 'Boards'],
        ];
        $this->boards = Board::whereIn('team_id', $teamIds)->with('team')->get();
    }

    public function mount(): void
    {
        $this->loadBoards();
    }

    #[\Livewire\Attributes\On('refresh-board')]
    public function refreshBoards()
    {
        $this->loadBoards();
    }

    public function render(): View
    {
        return view('boards.show');
    }
}
