<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/whoami', function () {
    return 'JOHN LLOYD R. RAMIGOSO | Block 4C | ITRACKB4 Laravel 12';
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('games', GameController::class);