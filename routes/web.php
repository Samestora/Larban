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
});
// Overwrite a bit for the redirection
use App\Http\Controllers\Auth\RegisteredUserController;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest']);

// Main functionality
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ColumnController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session')])
    ->prefix('boards')
    ->group(function () {
        // List all boards
        Route::get('/', [BoardsController::class, 'index'])->name('boards');

        // Create a new board
        Route::get('/create', [BoardsController::class, 'create'])->name('boards.create');

        // Show a specific board
        Route::get('/{board}', [BoardController::class, 'show'])->name('boards.show');
        Route::get('/{board}/create', [BoardController::class, 'create'])->name('board.create');

        Route::post('/columns', [ColumnController::class, 'store'])->name('columns.store');

        Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
        Route::post('/cards/sort', [CardController::class, 'sort'])->name('cards.sort');
        Route::get('/cards/{card}', [CardController::class, 'show'])->name('cards.show');
    });
