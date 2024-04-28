<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            [
                'name' => 'Acción',
                'img_path'  => 'action.png'
            ],
            [
                'name' => 'Aventura',
                'img_path'  => 'adventure.png'
            ],
            [
                'name' => 'Indie',
                'img_path'  => 'indie.png'
            ],
            [
                'name' => 'RPG',
                'img_path'  => 'rpg.png'
            ],
            [
                'name' => 'Shooter/FPS',
                'img_path'  => 'shooter.png'
            ],
            [
                'name' => 'Simulación',
                'img_path'  => 'simulation.png'
            ]
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre['name'],
                'img_path' => $genre['img_path']
            ]);
        }
    }
}
