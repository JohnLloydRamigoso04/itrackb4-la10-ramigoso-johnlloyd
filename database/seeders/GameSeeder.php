<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::create(['title' => 'The Legend of Zelda: Breath of the Wild', 'developer' => 'Nintendo', 'genre' => 'Action-adventure', 'release_year' => 2017, 'is_multiplayer' => false, 'metacritic_score' => 97]);
        Game::create(['title' => 'Elden Ring', 'developer' => 'FromSoftware', 'genre' => 'Action RPG', 'release_year' => 2022, 'is_multiplayer' => true, 'metacritic_score' => 96]);
        Game::create(['title' => 'Cyberpunk 2077', 'developer' => 'CD Projekt Red', 'genre' => 'Action RPG', 'release_year' => 2020, 'is_multiplayer' => false, 'metacritic_score' => 86]);
        Game::create(['title' => 'Minecraft', 'developer' => 'Mojang Studios', 'genre' => 'Sandbox', 'release_year' => 2011, 'is_multiplayer' => true, 'metacritic_score' => 93]);
        Game::create(['title' => 'Stardew Valley', 'developer' => 'ConcernedApe', 'genre' => 'Simulation', 'release_year' => 2016, 'is_multiplayer' => true, 'metacritic_score' => 89]);
    }
}