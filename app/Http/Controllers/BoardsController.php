<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardsController extends Controller
{
    public function index()
    {
        // Authorize if using teams
        $team = Auth::user()->currentTeam; // or however you get the team
        $boards = Board::where('team_id', $team->id)->get();

        return view('boards', compact('boards', 'team'));
    }
}
