<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Genre;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create the lookup rows first and hold them in variables
        $actionAdv = Genre::create(['name' => 'Action-adventure']);
        $actionRpg = Genre::create(['name' => 'Action RPG']);
        $sandbox   = Genre::create(['name' => 'Sandbox']);
        $sim       = Genre::create(['name' => 'Simulation']);
        $metroid   = Genre::create(['name' => 'Metroidvania']);

        // 2. Create the games pointing to the $genre->id
        Game::create(['title' => 'The Legend of Zelda: Breath of the Wild', 'developer' => 'Nintendo', 'release_year' => 2017, 'is_multiplayer' => false, 'metacritic_score' => 97, 'genre_id' => $actionAdv->id]);
        Game::create(['title' => 'Elden Ring', 'developer' => 'FromSoftware', 'release_year' => 2022, 'is_multiplayer' => true, 'metacritic_score' => 96, 'genre_id' => $actionRpg->id]);
        Game::create(['title' => 'Cyberpunk 2077', 'developer' => 'CD Projekt Red', 'release_year' => 2020, 'is_multiplayer' => false, 'metacritic_score' => 86, 'genre_id' => $actionRpg->id]);
        Game::create(['title' => 'Minecraft', 'developer' => 'Mojang Studios', 'release_year' => 2011, 'is_multiplayer' => true, 'metacritic_score' => 93, 'genre_id' => $sandbox->id]);
        Game::create(['title' => 'Stardew Valley', 'developer' => 'ConcernedApe', 'release_year' => 2016, 'is_multiplayer' => true, 'metacritic_score' => 89, 'genre_id' => $sim->id]);
    }
}