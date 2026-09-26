<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('games.index') }}">Game Vault</a>
        <div class="navbar-nav">
            <a class="nav-link {{ request()->is('games*') ? 'active fw-bold text-warning' : '' }}" href="{{ route('games.index') }}">
                Games Library
            </a>
            <a class="nav-link" href="{{ route('games.featured') }}">Featured</a>
        </div>
    </div>
</nav>