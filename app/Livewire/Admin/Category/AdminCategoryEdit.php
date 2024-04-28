<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategoryEdit extends Component
{
    use WithFileUploads;

    public $category_id;

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

    public function editCategory()
    {
        $this->validate();

        $category = Category::find($this->category_id);
        $category->name = $this->name;


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

        if ($this->delete_image) {
            Storage::disk('local')->delete('public/icons/' . $category->img_path);
            $category->img_path = null;
        }

        $category->save();

        return redirect()->route('admin.category')->with('category_edited', true);
    }

    public function mount($category_id)
    {
        $this->$category_id = $category_id;

        $category = Category::find($this->category_id);

        $this->name = $category->name;
        $this->icon = null;

        $this->delete_image = false;
    }

    public function render()
    {
        $category = Category::find($this->category_id);

        if ($this->delete_image) {
            $category->img_path = null;
        }

        return view('livewire.admin.category.admin-category-edit', [
            'category' => $category
        ]);
    }
}
