<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    private function getGames()
    {
        return [
            1 => ['id' => 1, 'title' => 'The Legend of Zelda: Breath of the Wild', 'developer' => 'Nintendo', 'genre' => 'Action-adventure'],
            2 => ['id' => 2, 'title' => 'Elden Ring', 'developer' => 'FromSoftware', 'genre' => 'Action RPG'],
            3 => ['id' => 3, 'title' => 'Cyberpunk 2077', 'developer' => 'CD Projekt Red', 'genre' => 'Action RPG'],
            4 => ['id' => 4, 'title' => 'Minecraft', 'developer' => 'Mojang Studios', 'genre' => 'Sandbox'],
            5 => ['id' => 5, 'title' => 'Hollow Knight', 'developer' => 'Team Cherry', 'genre' => 'Metroidvania'],
            6 => ['id' => 6, 'title' => 'Stardew Valley', 'developer' => 'ConcernedApe', 'genre' => 'Simulation'],
        ];
    }

    public function index()
    {
        $games = $this->getGames();
        return view('games.index', [
            'games' => $games,
            'activeFilter' => 'All'
        ]);
    }

    public function create()
    {
        // Empty stub
    }

    public function store(Request $request)
    {
        // Empty stub
    }

    public function show(string $id)
    {
        $games = $this->getGames();

        if (!isset($games[$id])) {
            abort(404);
        }

        return view('games.show', ['game' => $games[$id]]);
    }

    public function edit(string $id)
    {
        // Empty stub
    }

    public function update(Request $request, string $id)
    {
        // Empty stub
    }

    public function destroy(string $id)
    {
        // Empty stub
    }

    public function featured()
    {
        $games = $this->getGames();
        $featuredGame = $games[2];
        return view('games.show', ['game' => $featuredGame]);
    }

    public function filter($genre = null)
    {
        $allGames = $this->getGames();

        if ($genre === null) {
            $games = $allGames;
            $activeFilter = 'All';
        } else {
            $games = [];
            foreach ($allGames as $game) {
                if (strtolower($game['genre']) === strtolower($genre)) {
                    $games[$game['id']] = $game;
                }
            }
            $activeFilter = $genre;
        }

        return view('games.index', [
            'games' => $games,
            'activeFilter' => $activeFilter
        ]);
    }
}