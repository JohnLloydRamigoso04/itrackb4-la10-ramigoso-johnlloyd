@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <h2>Edit Game</h2>

    <form action="{{ route('games.update', $game) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $game->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="developer" class="form-label">Developer</label>
            <input type="text" name="developer" id="developer" class="form-control" 
                   value="{{ old('developer', $game->developer) }}" required>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id" class="form-select" required>
                <option value="">-- Select a Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(old('genre_id', $game->genre_id) == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="number" name="release_year" id="release_year" class="form-control" 
                   value="{{ old('release_year', $game->release_year) }}" required>
        </div>

        <div class="mb-3">
            <label for="is_multiplayer" class="form-label">Multiplayer?</label>
            <select name="is_multiplayer" id="is_multiplayer" class="form-select" required>
                <option value="1" @selected(old('is_multiplayer', $game->is_multiplayer) == 1)>Yes</option>
                <option value="0" @selected(old('is_multiplayer', $game->is_multiplayer) == 0)>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="metacritic_score" class="form-label">Metacritic Score (Optional)</label>
            <input type="number" name="metacritic_score" id="metacritic_score" class="form-control" 
                   value="{{ old('metacritic_score', $game->metacritic_score) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Game</button>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection