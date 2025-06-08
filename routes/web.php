<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/stats', function () {
        return view('stats');
    })->name('stats.show');
});
// Overwrite a bit for the redirection
use App\Http\Controllers\Auth\RegisteredUserController;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest']);

use App\Http\Controllers\CardController;
use App\Livewire\Board\ShowCard;
use App\Livewire\ShowBoards;
use App\Livewire\ShowBoard;

// Main functionality
Route::middleware(['auth:sanctum', config('jetstream.auth_session')])
    ->prefix('boards')
    ->group(function () {
        Route::get('/', ShowBoards::class)->name('boards.show');
        Route::get('/{board}', ShowBoard::class)->name('board.show');
        Route::get('/cards/{card}', ShowCard::class)->name('card.show');
        Route::post('/cards/sort', [CardController::class, 'sort'])->name('card.sort');
    });
