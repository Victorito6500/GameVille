<?php

namespace App\Livewire\Client\Catalog;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsCatalog extends Component
{
    use WithPagination;

    // Filter from Nav Search Bar
    public $search;

    // Checked Filters from another view
    public $selected_genre;
    public $selected_platform;
    public $selected_category;

    // Filters wire:model
    public $categoryFilter;
    public $genreFilter;
    public $platformFilter;
    public $orderByFilter;
    public $numPerPage;

    // Responsive menu flag
    public $responsive_filter_menu = false;

    // Get the field and direction to order the products
    private function getOrderBy()
    {
        switch ($this->orderByFilter) {
            case '1':
                $orderByField = 'name';
                $orderByDir = 'asc';
                break;
            case '2':
                $orderByField = 'name';
                $orderByDir = 'desc';
                break;
            case '3':
                $orderByField = 'price';
                $orderByDir = 'asc';
                break;
            case '4':
                $orderByField = 'price';
                $orderByDir = 'desc';
                break;
            case '5':
                $orderByField = 'release_date';
                $orderByDir = 'desc';
                break;
            case '6':
                $orderByField = 'release_date';
                $orderByDir = 'asc';
                break;
            default:
                $orderByField = 'name';
                $orderByDir = 'asc';
                break;
        }

        return ['orderByField' => $orderByField, 'orderByDir' => $orderByDir];
    }

    // Get the products 
    private function getProducts($orderBy)
    {
        if (empty($this->categoryFilter) && empty($this->genreFilter) && empty($this->platformFilter) && is_null($this->search)) {
            $products = Product::orderBy($orderBy['orderByField'], $orderBy['orderByDir'])->paginate($this->numPerPage);
        } else {

            $products = Product::query()
                ->when($this->categoryFilter, function ($query) {
                    $query->whereIn('category_id', $this->categoryFilter);
                })
                ->when($this->genreFilter, function ($query) {
                    $query->whereIn('genre_id', $this->genreFilter);
                })
                ->when($this->platformFilter, function ($query) {
                    $query->whereIn('platform_id', $this->platformFilter);
                })
                ->when($this->search, function ($query) {
                    $query->where('name', 'like', "%$this->search%");
                })
                ->orderBy($orderBy['orderByField'], $orderBy['orderByDir'])
                ->paginate($this->numPerPage);
        }

        return $products;
    }

    // Toggle the filter menu in responsive
    public function showFiltersMenu()
    {
        $this->responsive_filter_menu == false ? $this->responsive_filter_menu = true : $this->responsive_filter_menu = false;
    }

    // Clear all Filters
    public function clearFilters()
    {
        $this->search = null;
        $this->categoryFilter = [];
        $this->genreFilter = [];
        $this->platformFilter = [];
    }

    // Reset page for category filter
    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }

    // Reset page for genre filter
    public function updatingGenreFilter()
    {
        $this->resetPage();
    }

    // Reset page for platform filter
    public function updatingPlatformFilter()
    {
        $this->resetPage();
    }

    // Reset page for order by filter
    public function updatingOrderByFilter()
    {
        $this->resetPage();
    }

    // Reset page for number of products per page filter
    public function updatingNumPerPage()
    {
        $this->resetPage();
    }

    // Remove the selected category filter
    public function removeCategoryFilter($id)
    {
        $selected_filters = collect($this->categoryFilter);
        $key = $selected_filters->search($id);
        $selected_filters->forget($key);
        $this->categoryFilter = $selected_filters->all();
    }

    // Remove the selected genre filter
    public function removeGenreFilter($id)
    {
        $selected_filters = collect($this->genreFilter);
        $key = $selected_filters->search($id);
        $selected_filters->forget($key);
        $this->genreFilter = $selected_filters->all();
    }

    // Remove the selected platform filter
    public function removePlatformFilter($id)
    {
        $selected_filters = collect($this->platformFilter);
        $key = $selected_filters->search($id);
        $selected_filters->forget($key);
        $this->platformFilter = $selected_filters->all();
    }

    public function mount(Request $request)
    {
        if (Auth::user() && Auth::user()->isAdmin == 1) {
            return redirect()->route('admin.home');
        }

        $this->categoryFilter = [];
        $this->genreFilter = [];
        $this->platformFilter = [];
        $this->orderByFilter = '1';
        $this->numPerPage = 10;
        $this->search = $request->search;

        if (!is_null($request->category_id)) {
            array_push($this->categoryFilter, $request->category_id);
        }

        if (!is_null($request->genre_id)) {
            array_push($this->genreFilter, $request->genre_id);
        }

        if (!is_null($request->platform_id)) {
            array_push($this->platformFilter, $request->platform_id);
        }
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();
        $platforms = Platform::orderBy('name', 'asc')->get();
        $products = $this->getProducts($this->getOrderBy());

        return view('livewire.client.catalog.products-catalog', [
            'categories' => $categories,
            'genres' => $genres,
            'platforms' => $platforms,
            'products' => $products
        ]);
    }
}
