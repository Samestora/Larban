<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    // ColumnController.php
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ]);

        Column::create([
            'name' => $request->name,
            'board_id' => $request->board_id,
        ]);

        return back();
    }
}
