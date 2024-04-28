<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Videojuegos',
                'img_path' => null
            ],
            [
                'name' => 'Mandos',
                'img_path'  => 'controller.png'
            ],
            [
                'name' => 'Consolas',
                'img_path'  => 'console.png'
            ],
            [
                'name' => 'Ordenadores',
                'img_path'  => 'computer.png'
            ],
            [
                'name' => 'Auriculares',
                'img_path'  => 'headphones.png'
            ],
            [
                'name' => 'Monitores',
                'img_path'  => 'monitor.png'
            ],
            [
                'name' => 'Smartphones',
                'img_path'  => 'smartphone.png'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'img_path' => $category['img_path']
            ]);
        }
    }
}
