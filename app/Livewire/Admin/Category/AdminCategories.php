<?php

namespace App\Livewire\Admin\Category;

use App\Livewire\Alert\SuccessAlert;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminCategories extends Component
{
    // Filter wire:model
    public $searchCategoryFilter;

    // Flag for modal
    public $confirmCategoryDelete;

    public $selected_category_id;

    public function showConfirmModal($category_id)
    {
        $this->selected_category_id = $category_id;
        $this->confirmCategoryDelete = true;
    }

    public function deleteCategory()
    {
        $category = Category::find($this->selected_category_id);

        Storage::disk('local')->delete('public/icons/' . $category->img_path);

        $category->delete();

        $this->confirmCategoryDelete = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡La categoría se ha eliminado correctamente!')->to(SuccessAlert::class);
    }

    public function createNewCategory()
    {
        return redirect()->route('admin.category.create');
    }

    public function mount()
    {
        $this->searchCategoryFilter = '';

        $this->confirmCategoryDelete = false;

        $this->selected_category_id = null;

        if (session()->has('category_edited')) {
            $this->dispatch('successAlert', msg: '¡La categoría se ha modifcado correctamente!')->to(SuccessAlert::class);
        }

        if (session()->has('category_created')) {
            $this->dispatch('successAlert', msg: '¡La categoría se ha creado correctamente!')->to(SuccessAlert::class);
        }
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->searchCategoryFilter . '%')->get();

        $selected_category = $this->selected_category_id ? Category::find($this->selected_category_id) : null;

        return view('livewire.admin.category.admin-categories', [
            'categories' => $categories,
            'selected_category' => $selected_category
        ]);
    }
}
