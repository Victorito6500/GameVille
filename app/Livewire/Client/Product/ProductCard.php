<?php

namespace App\Livewire\Client\Product;

use App\Livewire\Alert\DangerAlert;
use App\Livewire\Alert\SuccessAlert;
use App\Livewire\Navbar\NavigationBar;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCard extends Component
{
    use WithPagination;

    public $product;
    public $title_size = "text-xl";
    public $col_span_img = "col-span-4";
    public $col_span_details = "col-span-8";

    public function productDetails()
    {
        return redirect()->route('catalog.show', ['product_id' => $this->product->id]);
    }

    public function addToCart()
    {
        // Check user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if there is stock left
        $productDB = Product::find($this->product->id);
        if ($productDB->stock <= 0) {
            return $this->dispatch('dangerAlert', msg: '¡No queda stock!')->to(DangerAlert::class);
        }

        // Add product to the Cart
        $shopping_cart = \Cart::session(Auth::user()->id);
        $shopping_cart->add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'quantity' => 1,
            'attributes' => ['image_path' => $this->product->image_path]
        ]);

        // Remove one from the product stock
        $productDB->stock--;
        $productDB->save();

        // Send event to refresh cart quantity in navbar
        $this->dispatch('cartRefresh')->to(NavigationBar::class);

        // Send event to show a success alert
        $this->dispatch('successAlert', msg: '¡El articulo ha sido agregado a su carrito!')->to(SuccessAlert::class);
    }

    public function render()
    {
        return view('livewire.client.product.product-card');
    }
}
