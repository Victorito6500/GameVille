<?php

namespace App\Livewire\Client\Home;

use Livewire\Component;

class HomeCategoryButton extends Component
{
    public $id;
    public $name;
    public $img_path;
    public $input_name;

    public function render()
    {
        return view('livewire.client.home.home-category-button');
    }
}
