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

    public function index(Request $request)
    {
        $allGames = $this->getGames();
        $genre = $request->query('genre');
        $developer = $request->query('developer');

        // Filter array using both query parameters preserving keys
        $games = array_filter($allGames, function ($game) use ($genre, $developer) {
            $matchGenre = !$genre || strtolower($game['genre']) === strtolower($genre);
            $matchDev = !$developer || strtolower($game['developer']) === strtolower($developer);
            return $matchGenre && $matchDev;
        });

        return view('games.index', [
            'games' => $games,
            'selectedGenre' => $genre,
            'selectedDeveloper' => $developer,
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
}