<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Replace 'genre' with 'genre_id' in your $fillable array:
    protected $fillable = [
        'title', 'developer', 'genre_id', 'release_year', 'is_multiplayer', 'metacritic_score'
    ];

    // Add this method inside the class:
    public function genre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    protected function casts(): array
    {
        return [
            'release_year' => 'integer',
            'is_multiplayer' => 'boolean',
            'metacritic_score' => 'integer',
        ];
    }
}
