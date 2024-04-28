<?php

namespace App\Livewire\Client\Home;

use App\Livewire\Alert\DangerAlert;
use Livewire\Component;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    public function mount()
    {
        if (Auth::user() && Auth::user()->isAdmin == 1) {
            return redirect()->route('admin.home');
        }
    }

    public function render()
    {
        $videogames_genres = Genre::orderBy('name', 'asc')->get();
        $categories = Category::where('name', '!=', 'Videojuegos')->orderBy('name', 'asc')->get();
        $new_releases = Product::orderBy('release_date', 'desc')->limit(6)->get();
        $top_sales = Product::select('products.*', DB::raw('SUM(order_details.quantity) as quantity'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->groupBy('products.id')
            ->orderBy('quantity', 'desc')
            ->limit(3)
            ->get();

        return view('livewire.client.home.home', [
            'videogames_genres' => $videogames_genres,
            'categories' => $categories,
            'top_sales' => $top_sales,
            'new_releases' => $new_releases
        ]);
    }
}
