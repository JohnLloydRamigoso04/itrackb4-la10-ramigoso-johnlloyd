<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre; // Part E: Import the lookup model
use Illuminate\Support\Facades\DB; // Part F: Import DB for query counting

class GameController extends Controller
{
   public function index(Request $request)
    {
        // Part F: Temporary query counter
        DB::enableQueryLog(); 

        $genre_id = $request->query('genre_id'); // Part E: Filter by ID
        $developer = $request->query('developer');

        // FOR SCREENSHOT 6: Leave it exactly like this (Game::query())
        // FOR SCREENSHOT 7: Change this to -> Game::with('genre');
        $query = Game::with('genre');

        if ($genre_id) {
            $query = $query->where('genre_id', $genre_id);
        }
        
        if ($developer) {
            $query = $query->where('developer', $developer);
        }

        $games = $query->get();

        return view('games.index', [
            'games' => $games,
            'selectedGenreId' => $genre_id,
            'selectedDeveloper' => $developer
        ]);
    }

    public function show(Game $game)
    {
        // No findOrFail needed! Laravel fetches it automatically.
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $genres = Genre::all(); // Fetch lookup rows for the dropdown
        return view('games.edit', compact('game', 'genres'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:100',
            'genre_id' => 'required|exists:genres,id',
            'release_year' => 'required|integer',
            'is_multiplayer' => 'required|boolean',
            'metacritic_score' => 'nullable|integer'
        ]);

        $game->update($validated);

        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    }
}