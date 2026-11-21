<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'gameCount' => Game::count(),
            'genreCount' => Genre::count(),
        ]);
    }
}