<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/whoami', function () {
    return 'JOHN LLOYD R. RAMIGOSO | Block 4C | ITRACKB4 Laravel 12';
});

// Part C: Custom routes placed BEFORE Route::resource to prevent parameter hijacking
Route::get('/games/featured', [GameController::class, 'featured'])->name('games.featured');
Route::get('/games/filter/{genre?}', [GameController::class, 'filter'])->name('games.filter');

// Parts B & D: Resource line restricted to implemented actions only
Route::resource('games', GameController::class)->only(['index', 'show']);