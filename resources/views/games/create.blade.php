@extends('layouts.app')

@section('title', 'Add New Game')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Add a New Game</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('games.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Game Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="developer" class="form-label fw-bold">Developer</label>
                <input type="text" name="developer" id="developer" class="form-control @error('developer') is-invalid @enderror" value="{{ old('developer') }}" required>
                @error('developer')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label fw-bold">Genre</label>
                <select name="genre_id" id="genre_id" class="form-select @error('genre_id') is-invalid @enderror" required>
                    <option value="">-- Select Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="release_year" class="form-label fw-bold">Release Year</label>
                <input type="number" name="release_year" id="release_year" class="form-control @error('release_year') is-invalid @enderror" value="{{ old('release_year') }}" required>
                @error('release_year')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_multiplayer" class="form-label fw-bold">Game Mode</label>
                <select name="is_multiplayer" id="is_multiplayer" class="form-select @error('is_multiplayer') is-invalid @enderror" required>
                    <option value="1" @selected(old('is_multiplayer') === '1')>Multiplayer</option>
                    <option value="0" @selected(old('is_multiplayer') === '0')>Single-player</option>
                </select>
                @error('is_multiplayer')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="metacritic_score" class="form-label fw-bold">Metacritic Score (Optional)</label>
                <input type="number" name="metacritic_score" id="metacritic_score" class="form-control @error('metacritic_score') is-invalid @enderror" value="{{ old('metacritic_score') }}">
                @error('metacritic_score')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success">Save Game</button>
            </div>
        </form>
    </div>
</div>
@endsection