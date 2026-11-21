@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
<div class="card shadow-sm text-center py-5">
    <div class="card-body">
        <h1 class="display-5 text-danger">500 — Something Went Wrong</h1>
        <p class="lead">Our video game database ran into an unexpected problem on our end. Please try again shortly.</p>
        <a href="{{ route('games.index') }}" class="btn btn-secondary mt-2">Return to Game List</a>
    </div>
</div>
@endsection