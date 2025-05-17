<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function show(Board $board)
    {
        abort_unless($board->team_id === Auth::user()->currentTeam->id, 403);

        $board->load('columns.cards');

        $columns = $board->columns;

        return view('board.show', compact('board', 'columns'));
    }
}
