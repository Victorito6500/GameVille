<?php

namespace App\Livewire\Admin\Product;

use App\Livewire\Alert\SuccessAlert;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProducts extends Component
{
    use WithPagination;

    // Filter wire:model
    public $searchProductFilter;
    public $categoryFilter;
    public $genreFilter;
    public $platformFilter;

    // Flag for modal
    public $confirmProductDelete;

    public $selected_product_id;

    // Reset page for search filter
    public function updatingSearchProductFilter()
    {
        $this->resetPage();
    }
    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }
    public function updatingGenreFilter()
    {
        $this->resetPage();
    }
    public function updatingPlatformFilter()
    {
        $this->resetPage();
    }

    public function showConfirmModal($product_id)
    {
        $this->selected_product_id = $product_id;
        $this->confirmProductDelete = true;
    }

    public function deleteProduct()
    {
        $product = Product::find($this->selected_product_id);
        $product->delete();

        $this->confirmProductDelete = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El producto se ha eliminado correctamente!')->to(SuccessAlert::class);
    }

    public function mount()
    {
        $this->searchProductFilter = '';
        $this->categoryFilter = '';
        $this->genreFilter = '';
        $this->platformFilter = '';

        $this->confirmProductDelete = false;

        $this->selected_product_id = null;

        if (session()->has('product_edited')) {
            $this->dispatch('successAlert', msg: '¡El producto se ha modifcado correctamente!')->to(SuccessAlert::class);
        }

        if (session()->has('product_created')) {
            $this->dispatch('successAlert', msg: '¡El producto se ha creado correctamente!')->to(SuccessAlert::class);
        }
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->genreFilter, function ($query) {
                $query->where('genre_id', $this->genreFilter);
            })
            ->when($this->platformFilter, function ($query) {
                $query->where('platform_id', $this->platformFilter);
            })
            ->when($this->searchProductFilter, function ($query) {
                $query->where('name', 'like', "%$this->searchProductFilter%");
            })
            ->paginate(5);

        $categories = Category::all();
        $genres = Genre::all();
        $platforms = Platform::all();

        $selected_product = $this->selected_product_id ? Product::find($this->selected_product_id) : null;

        return view('livewire.admin.product.admin-products', [
            'products' => $products,
            'categories' => $categories,
            'genres' => $genres,
            'platforms' => $platforms,
            'selected_product' => $selected_product
        ]);
    }
}
