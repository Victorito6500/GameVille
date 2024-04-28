<?php

namespace App\Livewire\Client\Cart;

use App\Livewire\Alert\DangerAlert;
use App\Livewire\Alert\SuccessAlert;
use App\Livewire\Navbar\NavigationBar;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCart extends Component
{
    private function actionEvents($event = "", $msg = "")
    {
        // Send event to refresh cart quantity in navbar
        $this->dispatch('cartRefresh')->to(NavigationBar::class);

        if ($event != "" && $msg != "") {
            // Send event to show a success alert
            if ($event == 'successAlert') {
                $this->dispatch($event, msg: $msg)->to(SuccessAlert::class);
            }
            if ($event == 'dangerAlert') {
                $this->dispatch($event, msg: $msg)->to(DangerAlert::class);
            }
        }
    }

    public function removeItem($product_id)
    {
        $shopping_cart = \Cart::session(Auth::user()->id);
        $productDB = Product::find($product_id);
        $productQuantity = $shopping_cart->get($product_id)->quantity;

        // Add to stock the quantity in Cart
        $productDB->stock = $productDB->stock + $productQuantity;
        $productDB->save();

        // Remove the product from the cart
        $shopping_cart->remove($product_id);

        return $this->actionEvents('successAlert', '¡El articulo se ha eliminado del carrito!');
    }

    public function clearCart()
    {
        $shopping_cart = \Cart::session(Auth::user()->id);
        $cart_content = $shopping_cart->getContent();

        foreach ($cart_content as $product) {
            $productDB = Product::find($product->id);
            $productQuantity = $shopping_cart->get($product->id)->quantity;

            // Add to stock the quantity in Cart
            $productDB->stock = $productDB->stock + $productQuantity;
            $productDB->save();
        }

        // Clear the Cart
        $shopping_cart->clear();

        $this->actionEvents('successAlert', '¡Tu carrito de ha vaciado!');
    }

    public function addOne($product_id)
    {
        $shopping_cart = \Cart::session(Auth::user()->id);
        $productDB = Product::find($product_id);

        if ($productDB->stock <= 0) {
            return $this->actionEvents('dangerAlert', '¡No queda stock!');
        }

        // Remove one from the product stock
        $productDB->stock--;
        $productDB->save();

        // Add one in Cart
        $shopping_cart->update($product_id, ['quantity' => 1]);

        return $this->actionEvents();
    }

    public function removeOne($product_id)
    {
        $shopping_cart = \Cart::session(Auth::user()->id);
        $product_quantity = $shopping_cart->get($product_id)->quantity;
        $productDB = Product::find($product_id);

        // Add one from the product stock
        $productDB->stock++;
        $productDB->save();

        if ($product_quantity <= 1) {
            $shopping_cart->remove($product_id);
            $this->actionEvents('successAlert', '¡El articulo se ha eliminado del carrito!');
        } else {
            $shopping_cart->update($product_id, ['quantity' => -1]);
            $this->actionEvents();
        }
    }

    public function productDetails($product_id)
    {
        return redirect()->route('catalog.show', ['product_id' => $product_id]);
    }

    public function render()
    {
        $shopping_cart = \Cart::session(Auth::user()->id);
        $cart_content = $shopping_cart->getContent();
        $cart_total_quantity = $shopping_cart->getTotalQuantity();
        $cart_total = $shopping_cart->getTotal();
        $shipping_cost = 3.90;

        return view('livewire.client.cart.shopping-cart', [
            'cart_content' => $cart_content->sort(),
            'cart_total_quantity' => $cart_total_quantity,
            'cart_total' => $cart_total,
            'shipping_cost' => $shipping_cost
        ]);
    }
}
