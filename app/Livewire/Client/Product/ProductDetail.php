<?php

namespace App\Livewire\Client\Product;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product_id;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        $product = Product::with(['genre', 'platform', 'category'])->where('id', $this->product_id)->first();

        $related_products = [];
        $selected_genre = null;
        $selected_platform = null;
        $selected_category = null;

        if (!$product) {
            return view('livewire.client.product.product-detail', [
                'product' => $product,
                'related_products' => $related_products,
                'selected_genre' => $selected_genre,
                'selected_platform' => $selected_platform,
                'selected_category' => $selected_category
            ]);
        }

        if ($product->genre) {
            $related_products = Product::where('genre_id', $product->genre->id)
                ->where('id', '!=', $this->product_id)
                ->limit(3)
                ->get();

            $selected_genre = $product->genre->id;
        }

        if (sizeof($related_products) == 0) {
            if ($product->platform) {
                $related_products = Product::where('platform_id', $product->platform->id)
                    ->where('id', '!=', $this->product_id)
                    ->limit(3)
                    ->get();

                $selected_platform = $product->platform->id;
            }
        }

        if (sizeof($related_products) == 0) {
            if ($product->category) {
                $related_products = Product::where('category_id', $product->category->id)
                    ->where('id', '!=', $this->product_id)
                    ->limit(3)
                    ->get();

                $selected_category = $product->category->id;
            }
        }

        switch (sizeof($related_products)) {
            case 1:
                $col_span = 'col-span-4';
                break;
            case 2:
                $col_span = 'col-span-8';
                break;
            default:
                $col_span = 'col-span-12';
                break;
        }

        return view('livewire.client.product.product-detail', [
            'product' => $product,
            'related_products' => $related_products,
            'selected_genre' => $selected_genre,
            'selected_platform' => $selected_platform,
            'selected_category' => $selected_category,
            'col_span' => $col_span
        ]);
    }
}
