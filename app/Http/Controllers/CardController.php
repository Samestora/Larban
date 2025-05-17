<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function show(Card $card)
    {
        return response()->json([
            'title' => $card->title,
            'description' => $card->description,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'column_id' => 'required|exists:columns,id',
        ]);


        $position = Card::where('column_id', $request->column_id)->max('position') + 1;

        $data = [
            'title' => $request->title,
            'column_id' => $request->column_id,
            'position' => $position,
        ];

        if ($request->filled('description')) {
            $data['description'] = $request->description;
        }

        Card::create($data);

        return back();
    }

    public function sort(Request $request)
    {
        $request->validate([
            'column_id' => 'required|exists:columns,id',
            'card_ids' => 'required|array',
        ]);

        foreach ($request->card_ids as $index => $cardId) {
            Card::where('id', $cardId)->update([
                'column_id' => $request->column_id,
                'position' => $index,
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
