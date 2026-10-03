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
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="developer" class="form-label fw-bold">Developer</label>
                <input type="text" name="developer" id="developer" class="form-control @error('developer') is-invalid @enderror" value="{{ old('developer') }}">
                @error('developer')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="genre" class="form-label fw-bold">Genre</label>
                <select name="genre" id="genre" class="form-select @error('genre') is-invalid @enderror">
                    <option value="">-- Select a Genre --</option>
                    <option value="Action RPG" @selected(old('genre') == 'Action RPG')>Action RPG</option>
                    <option value="Sandbox" @selected(old('genre') == 'Sandbox')>Sandbox</option>
                    <option value="Simulation" @selected(old('genre') == 'Simulation')>Simulation</option>
                    <option value="Action-adventure" @selected(old('genre') == 'Action-adventure')>Action-adventure</option>
                    <option value="Metroidvania" @selected(old('genre') == 'Metroidvania')>Metroidvania</option>
                </select>
                @error('genre')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Game</button>
            </div>
        </form>
    </div>
</div>
@endsection