<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/whoami', function () {
    return 'JOHN LLOYD R. RAMIGOSO | Block 4C | ITRACKB4 Laravel 12';
});


Route::get('/games/filter/{genre?}', function ($genre = null) {
    return redirect()->route('games.index', array_filter(['genre' => $genre]));
});

Route::get('/games/featured', [GameController::class, 'featured'])->name('games.featured');

Route::resource('games', GameController::class)->only(['index', 'show', 'create', 'store']);