@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body p-4">
        <h2>Organize, Track, and Rate Your Video Game Collection</h2>
        <p class="text-muted">
            Keep track of every title in your library by developer, genre, release year, multiplayer availability, and Metacritic score in one searchable catalog.
        </p>
        <a href="{{ route('games.index') }}" class="btn btn-primary">Browse All Video Games</a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-muted">Total Video Games Tracked</h5>
                <p class="display-6 fw-bold mb-0">{{ $gameCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-muted">Available Game Genres</h5>
                <p class="display-6 fw-bold mb-0">{{ $genreCount }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body d-flex align-items-center gap-3">
        <img src="{{ asset('img/profile.jpg') }}" width="96" height="96" class="rounded-circle object-fit-cover" alt="Developer Photo">
        <div>
            <h5 class="mb-1">John Lloyd Ramigoso</h5>
            <p class="mb-0 text-muted">BS Information Technology — 4th Year, Block C</p>
        </div>
    </div>
</div>
@endsection