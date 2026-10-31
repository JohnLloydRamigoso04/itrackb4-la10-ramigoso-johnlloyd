<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::all();
        
        $genre = $request->query('genre');
        $developer = $request->query('developer');

        if ($genre || $developer) {
            $games = Game::query()
                ->when($genre, fn($q) => $q->where('genre', $genre))
                ->when($developer, fn($q) => $q->where('developer', $developer))
                ->get();
        }

        return view('games.index', [
            'games' => $games,
            'selectedGenre' => $genre,
            'selectedDeveloper' => $developer
        ]);
    }

    public function show(string $id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
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
            'genre' => 'required|in:Action RPG,Sandbox,Simulation,Action-adventure,Metroidvania',
            'release_year' => 'required|integer',
            'is_multiplayer' => 'required|boolean',
            'metacritic_score' => 'nullable|integer'
        ]);

        // Eloquent handles the ID generation and saving automatically
        Game::create($validated);

        return redirect()->route('games.index')->with('success', 'Game added successfully!');
    }

    public function edit(string $id) { /* Empty stub */ }
    public function update(Request $request, string $id) { /* Empty stub */ }
    public function destroy(string $id) { /* Empty stub */ }

    public function featured()
    {
        // Fetch ID 3 directly from the database using Eloquent
        $featuredGame = Game::findOrFail(3); 
        return view('games.show', ['game' => $featuredGame]);
    }
}