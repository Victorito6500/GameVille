<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategoryCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $icon;

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
    }

    public function createCategory()
    {
        $this->validate();

        $category = Category::create([
            'name' => $this->name,
            'img_path' => null
        ]);

        if ($this->icon) {
            $img_path = time() . '_' . $this->icon->getClientOriginalName();

            $this->icon->storeAs(
                'public/icons',
                $img_path,
                'local'
            );

            Storage::disk('local')->delete('public/icons/' . $category->img_path);

            $category->img_path = $img_path;
        }

        $category->save();

        return redirect()->route('admin.category')->with('category_created', true);
    }

    public function render()
    {
        return view('livewire.admin.category.admin-category-create');
    }
}
