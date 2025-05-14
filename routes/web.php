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
