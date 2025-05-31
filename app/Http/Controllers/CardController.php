<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function update(Request $request) {}

    public function sort(Request $request)
    {
        $request->validate([
            'column_id' => 'required|exists:columns,id',
            'card_ids' => 'required|array',
        ]);

        foreach ($request->card_ids as $position => $cardId) {
            Card::where('id', $cardId)->update([
                'column_id' => $request->column_id,
                'position' => $position + 1,
            ]);
        }

        return response()->json(['message' => 'Cards reordered']);
    }
}
