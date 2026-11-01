@extends('layouts.app')

@section('title', 'Video Game List')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Video Games</h2>
            <div>
                @if($selectedGenreId || $selectedDeveloper)
                    <a href="{{ route('games.index') }}" class="btn btn-sm btn-outline-danger">Clear All Filters</a>
                @endif
                <a href="{{ route('games.create') }}" class="btn btn-sm btn-success">Add New Game</a>
            </div>
        </div>

        <!-- Active Filters Display -->
        <div class="mb-3 p-2 bg-light rounded border">
            <small class="fw-bold">Active Filters:</small>
            <span class="badge bg-primary ms-1">
                Genre ID: {{ $selectedGenreId ?? 'All' }}
            </span>
            <span class="badge bg-secondary ms-1">
                Developer: {{ $selectedDeveloper ?? 'All' }}
            </span>
        </div>

        <!-- Filter Controls using IDs (No extra DB query needed) -->
        <div class="row g-2 mb-4">
            <div class="col-md-6">
                <small class="fw-bold d-block mb-1">Filter by Genre:</small>
                <a href="{{ route('games.index', array_filter(['genre_id' => 1, 'developer' => $selectedDeveloper])) }}"
                   class="btn btn-sm mb-1 {{ $selectedGenreId == 1 ? 'btn-primary' : 'btn-outline-primary' }}">
                    Action-adventure
                </a>
                <a href="{{ route('games.index', array_filter(['genre_id' => 2, 'developer' => $selectedDeveloper])) }}"
                   class="btn btn-sm mb-1 {{ $selectedGenreId == 2 ? 'btn-primary' : 'btn-outline-primary' }}">
                    Action RPG
                </a>
            </div>
            <div class="col-md-6">
                <small class="fw-bold d-block mb-1">Filter by Developer:</small>
                <a href="{{ route('games.index', array_filter(['genre_id' => $selectedGenreId, 'developer' => 'FromSoftware'])) }}"
                   class="btn btn-sm {{ $selectedDeveloper === 'FromSoftware' ? 'btn-secondary' : 'btn-outline-secondary' }}">FromSoftware</a>
                <a href="{{ route('games.index', array_filter(['genre_id' => $selectedGenreId, 'developer' => 'Nintendo'])) }}"
                   class="btn btn-sm {{ $selectedDeveloper === 'Nintendo' ? 'btn-secondary' : 'btn-outline-secondary' }}">Nintendo</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Developer</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($games as $game)
                        <tr>
                            <td><strong>{{ $loop->iteration }}</strong></td>
                            <td>
                                <a href="{{ route('games.show', $game->id) }}" class="fw-bold text-decoration-none">
                                    {{ $game->title }}
                                </a>
                                @if($game->genre->name === 'Action RPG')
                                    <span class="badge bg-warning text-dark ms-1">Popular</span>
                                @endif
                            </td>
                            <td>{{ $game->developer }}</td>
                            <td><span class="badge bg-secondary">{{ $game->genre->name }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger py-4">
                                No video games found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection