@extends('layouts.app')

@section('title', 'Video Game List')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Catalog</h2>
            <a href="{{ route('games.create') }}" class="btn btn-sm btn-success">Add New Game</a>
        </div>

        <!-- Search, Filter, and Sort Form -->
        <form method="GET" action="{{ route('games.index') }}" class="row g-2 mb-4">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search title..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="genre_id" class="form-select">
                    <option value="">All Genres</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(request('genre_id') == $genre->id)>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <select name="is_multiplayer" class="form-select">
                    <option value="">Any Mode</option>
                    <option value="1" @selected(request('is_multiplayer') === '1')>Multiplayer</option>
                    <option value="0" @selected(request('is_multiplayer') === '0')>Single-player</option>
                </select>
            </div>

            <div class="col-md-2">
                <select name="sort" class="form-select">
                    <option value="title" @selected(request('sort') === 'title')>Sort: Title</option>
                    <option value="release_year" @selected(request('sort') === 'release_year')>Sort: Year</option>
                    <option value="metacritic_score" @selected(request('sort') === 'metacritic_score')>Sort: Score</option>
                </select>
            </div>

            <div class="col-md-2 d-flex gap-1">
                <button type="submit" class="btn btn-primary">Apply</button>
                <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">Clear</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Developer</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Mode</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($games as $game)
                        <tr>
                            <td><strong>{{ $loop->iteration }}</strong></td>
                            <td>
                                <a href="{{ route('games.show', $game) }}" class="fw-bold text-decoration-none">
                                    {{ $game->title }}
                                </a>
                            </td>
                            <td>{{ $game->developer }}</td>
                            <td><span class="badge bg-secondary">{{ $game->genre->name }}</span></td>
                            <td>{{ $game->release_year }}</td>
                            <td>{{ $game->is_multiplayer ? 'Multiplayer' : 'Single-player' }}</td>
                            <td>
                                <a href="{{ route('games.edit', $game) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('Delete this record?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-danger py-4">
                                No video games found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links AFTER the table -->
        <div>
            {{ $games->links() }}
        </div>
    </div>
</div>
@endsection