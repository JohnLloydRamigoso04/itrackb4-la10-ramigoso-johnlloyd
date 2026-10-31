<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title', 
        'developer', 
        'genre', 
        'release_year', 
        'is_multiplayer', 
        'metacritic_score'
    ];

    protected function casts(): array
    {
        return [
            'release_year' => 'integer',
            'is_multiplayer' => 'boolean',
            'metacritic_score' => 'integer',
        ];
    }
}
