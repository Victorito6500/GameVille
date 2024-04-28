<?php

namespace App\Livewire\Client\Home;

use Livewire\Component;

class HomeCategories extends Component
{
    public $videogames_genres;
    public $categories;

    public function render()
    {
        return view('livewire.client.home.home-categories');
    }
}
