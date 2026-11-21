<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre; 
use Illuminate\Support\Facades\DB; 

class GameController extends Controller
{
   public function index(Request $request)
{
    $search = $request->query('search');
    $genre_id = $request->query('genre_id');
    $is_multiplayer = $request->query('is_multiplayer');
    $sort = $request->query('sort', 'title');

    if (! in_array($sort, ['title', 'release_year', 'metacritic_score'])) {
        $sort = 'title';
    }

    $query = Game::with('genre');

    if ($search) {
        $query = $query->where('title', 'like', "%{$search}%");
    }

    if ($genre_id) {
        $query = $query->where('genre_id', $genre_id);
    }

    if ($is_multiplayer !== null && $is_multiplayer !== '') {
        $query = $query->where('is_multiplayer', $is_multiplayer);
    }

    $games = $query->orderBy($sort)->paginate(5)->withQueryString();
    $genres = Genre::all();

    return view('games.index', [
        'games' => $games,
        'genres' => $genres,
    ]);
}

public function create()
    {
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:100',
            'genre_id' => 'required|exists:genres,id',
            'release_year' => 'required|integer',
            'is_multiplayer' => 'required|boolean',
            'metacritic_score' => 'nullable|integer'
        ]);

        $game = Game::create($validated);

        Log::info('Game saved', [
            'id' => $game->id,
        ]);

        return redirect()->route('games.index')->with('success', 'Game added successfully!');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $genres = Genre::all();
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

        Log::info('Game saved', [
            'id' => $game->id,
        ]);

        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    public function destroy(Game $game)
{
    abort_if($game->genre->games()->count() === 1, 403);

    $game->delete();

    return redirect()->route('games.index');
}
}