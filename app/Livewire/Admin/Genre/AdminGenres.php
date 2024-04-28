<?php

namespace App\Livewire\Admin\Genre;

use App\Livewire\Alert\SuccessAlert;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminGenres extends Component
{
    // Filter wire:model
    public $searchGenreFilter;

    // Flag for modal
    public $confirmGenreDelete;

    public $selected_genre_id;

    public function showConfirmModal($genre_id)
    {
        $this->selected_genre_id = $genre_id;
        $this->confirmGenreDelete = true;
    }

    public function deleteGenre()
    {
        $genre = Genre::find($this->selected_genre_id);

        Storage::disk('local')->delete('public/icons/' . $genre->img_path);

        $genre->delete();

        $this->confirmGenreDelete = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El género se ha eliminado correctamente!')->to(SuccessAlert::class);
    }

    public function mount()
    {
        $this->searchGenreFilter = '';

        $this->confirmGenreDelete = false;

        $this->selected_genre_id = null;

        if (session()->has('genre_edited')) {
            $this->dispatch('successAlert', msg: '¡El género se ha modifcado correctamente!')->to(SuccessAlert::class);
        }

        if (session()->has('genre_created')) {
            $this->dispatch('successAlert', msg: '¡El género se ha creado correctamente!')->to(SuccessAlert::class);
        }
    }

    public function render()
    {
        $genres = Genre::where('name', 'like', '%' . $this->searchGenreFilter . '%')->get();

        $selected_genre = $this->selected_genre_id ? Genre::find($this->selected_genre_id) : null;

        return view('livewire.admin.genre.admin-genres', [
            'genres' => $genres,
            'selected_genre' => $selected_genre
        ]);
    }
}
