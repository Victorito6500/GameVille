<?php

namespace App\Livewire\Admin\Genre;

use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminGenreEdit extends Component
{
    use WithFileUploads;

    public $genre_id;

    public $name;
    public $icon;

    public $delete_image;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nombre es obligatorio',
            'name.max' => 'El nombre es demasiado largo',
            'icon.image' => 'El archivo debe ser una foto',
            'icon.max' => 'El archivo no puede superar 1MB',
        ];
    }

    public function deleteImage()
    {
        $this->icon = null;

        $this->delete_image = true;
    }

    public function editGenre()
    {
        $this->validate();

        $genre = Genre::find($this->genre_id);
        $genre->name = $this->name;


        if ($this->icon) {
            $img_path = time() . '_' . $this->icon->getClientOriginalName();

            $this->icon->storeAs(
                'public/icons',
                $img_path,
                'local'
            );

            Storage::disk('local')->delete('public/icons/' . $genre->img_path);

            $genre->img_path = $img_path;
        }

        if ($this->delete_image) {
            Storage::disk('local')->delete('public/icons/' . $genre->img_path);
            $genre->img_path = null;
        }

        $genre->save();

        return redirect()->route('admin.genre')->with('genre_edited', true);
    }

    public function mount($genre_id)
    {
        $this->genre_id = $genre_id;


        $genre = Genre::find($this->genre_id);

        $this->name = $genre->name;
        $this->icon = null;

        $this->delete_image = false;
    }

    public function render()
    {
        $genre = Genre::find($this->genre_id);

        if ($this->delete_image) {
            $genre->img_path = null;
        }

        return view('livewire.admin.genre.admin-genre-edit', [
            'genre' => $genre
        ]);
    }
}
