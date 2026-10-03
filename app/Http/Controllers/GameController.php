<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    // PART A: Read from JSON file
    private function getGames()
    {
        $path = storage_path('app/games.json');
        if (!file_exists($path)) {
            return [];
        }
        return json_decode(file_get_contents($path), true) ?? [];
    }

    // PART A: Write to JSON file
    private function saveGames(array $games)
    {
        $path = storage_path('app/games.json');
        file_put_contents($path, json_encode($games, JSON_PRETTY_PRINT));
    }

    public function index(Request $request)
    {
        $allGames = $this->getGames();
        $genre = $request->query('genre');
        $developer = $request->query('developer');

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
        return view('games.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:100',
            'genre' => 'required|in:Action RPG,Sandbox,Simulation,Action-adventure,Metroidvania' // Fixed list rule
        ]);

        $games = $this->getGames();

        $newId = empty($games) ? 1 : max(array_keys($games)) + 1;
        $validated['id'] = $newId;
        $games[$newId] = $validated;

        $this->saveGames($games);

        return redirect()->route('games.index')->with('success', 'Game added successfully!');
    }

    public function show(string $id)
    {
        $games = $this->getGames();

        if (!isset($games[$id])) {
            abort(404);
        }

        return view('games.show', ['game' => $games[$id]]);
    }

    public function edit(string $id) { /* Empty stub */ }
    public function update(Request $request, string $id) { /* Empty stub */ }
    public function destroy(string $id) { /* Empty stub */ }

    public function featured()
    {
        $games = $this->getGames();
        $featuredGame = $games[2] ?? null;
        if (!$featuredGame) abort(404);
        return view('games.show', ['game' => $featuredGame]);
    }
}