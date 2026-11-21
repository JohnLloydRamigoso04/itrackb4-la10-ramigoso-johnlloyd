@extends('layouts.app')

@section('title', 'Game Not Found')

@section('content')
<div class="card shadow-sm text-center py-5">
    <div class="card-body">
        <h1 class="display-5 text-danger">404 — Game Not Found</h1>
        <p class="lead">The video game you are looking for does not exist or may have been removed from the catalog.</p>
        <a href="{{ route('games.index') }}" class="btn btn-primary mt-2">Back to Video Game List</a>
    </div>
</div>
@endsection