<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Genre::firstOrCreate(['id' => 1], ['name' => 'Action-adventure']);
        Genre::firstOrCreate(['id' => 2], ['name' => 'Action RPG']);

        $games = [
            ['title' => 'Elden Ring', 'developer' => 'FromSoftware', 'genre_id' => 2, 'release_year' => 2022, 'is_multiplayer' => true, 'metacritic_score' => 96],
            ['title' => 'Dark Souls III', 'developer' => 'FromSoftware', 'genre_id' => 2, 'release_year' => 2016, 'is_multiplayer' => true, 'metacritic_score' => 89],
            ['title' => 'Sekiro: Shadows Die Twice', 'developer' => 'FromSoftware', 'genre_id' => 1, 'release_year' => 2019, 'is_multiplayer' => false, 'metacritic_score' => 90],
            ['title' => 'Bloodborne', 'developer' => 'FromSoftware', 'genre_id' => 2, 'release_year' => 2015, 'is_multiplayer' => true, 'metacritic_score' => 92],
            ['title' => 'The Legend of Zelda: Breath of the Wild', 'developer' => 'Nintendo', 'genre_id' => 1, 'release_year' => 2017, 'is_multiplayer' => false, 'metacritic_score' => 97],
            ['title' => 'The Legend of Zelda: Tears of the Kingdom', 'developer' => 'Nintendo', 'genre_id' => 1, 'release_year' => 2023, 'is_multiplayer' => false, 'metacritic_score' => 96],
            ['title' => 'Super Mario Odyssey', 'developer' => 'Nintendo', 'genre_id' => 1, 'release_year' => 2017, 'is_multiplayer' => true, 'metacritic_score' => 97],
            ['title' => 'Metroid Dread', 'developer' => 'Nintendo', 'genre_id' => 1, 'release_year' => 2021, 'is_multiplayer' => false, 'metacritic_score' => 88],
            ['title' => 'The Witcher 3: Wild Hunt', 'developer' => 'CD Projekt Red', 'genre_id' => 2, 'release_year' => 2015, 'is_multiplayer' => false, 'metacritic_score' => 93],
            ['title' => 'Cyberpunk 2077', 'developer' => 'CD Projekt Red', 'genre_id' => 2, 'release_year' => 2020, 'is_multiplayer' => false, 'metacritic_score' => 86],
            ['title' => 'Red Dead Redemption 2', 'developer' => 'Rockstar Games', 'genre_id' => 1, 'release_year' => 2018, 'is_multiplayer' => true, 'metacritic_score' => 97],
            ['title' => 'Grand Theft Auto V', 'developer' => 'Rockstar Games', 'genre_id' => 1, 'release_year' => 2013, 'is_multiplayer' => true, 'metacritic_score' => 97],
            ['title' => 'God of War Ragnarok', 'developer' => 'Santa Monica Studio', 'genre_id' => 1, 'release_year' => 2022, 'is_multiplayer' => false, 'metacritic_score' => 94],
            ['title' => 'Hollow Knight', 'developer' => 'Team Cherry', 'genre_id' => 1, 'release_year' => 2017, 'is_multiplayer' => false, 'metacritic_score' => 90],
            ['title' => 'Hades', 'developer' => 'Supergiant Games', 'genre_id' => 2, 'release_year' => 2020, 'is_multiplayer' => false, 'metacritic_score' => 93],
            ['title' => 'Baldurs Gate 3', 'developer' => 'Larian Studios', 'genre_id' => 2, 'release_year' => 2023, 'is_multiplayer' => true, 'metacritic_score' => 96],
            ['title' => 'Divinity: Original Sin 2', 'developer' => 'Larian Studios', 'genre_id' => 2, 'release_year' => 2017, 'is_multiplayer' => true, 'metacritic_score' => 93],
            ['title' => 'Resident Evil 4 Remake', 'developer' => 'Capcom', 'genre_id' => 1, 'release_year' => 2023, 'is_multiplayer' => false, 'metacritic_score' => 93],
            ['title' => 'Monster Hunter: World', 'developer' => 'Capcom', 'genre_id' => 2, 'release_year' => 2018, 'is_multiplayer' => true, 'metacritic_score' => 90],
            ['title' => 'Persona 5 Royal', 'developer' => 'Atlus', 'genre_id' => 2, 'release_year' => 2019, 'is_multiplayer' => false, 'metacritic_score' => 95],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}