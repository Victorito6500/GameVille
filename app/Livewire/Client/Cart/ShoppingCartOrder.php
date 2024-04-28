<?php

namespace App\Livewire\Client\Cart;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCartOrder extends Component
{
    // User details wire:models
    public $user_name;
    public $user_email;
    public $user_phone;
    public $user_address;

    // Payment details wire:models
    public $card_name;
    public $card_number;
    public $card_expire_month;
    public $card_expire_year;
    public $card_cvv;

    public function rules()
    {
        return [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'user_address' => 'required|string|max:255',
            'user_phone' => 'required|numeric|digits:9',
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|numeric|digits:16',
            'card_expire_month' => 'required|numeric',
            'card_expire_year' => 'required|numeric',
            'card_cvv' => 'required|numeric|digits:3',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'El nombre es obligatorio',
            'user_name.max' => 'El nombre es demasiado largo',
            'user_email.required' => 'El email es obligatorio',
            'user_email.email' => 'El email debe tener un formato correcto',
            'user_address.required' => 'La dirección es obligatoria',
            'user_address.max' => 'La dirección es demasiado largo',
            'user_phone.required' => 'El teléfono es obligatorio',
            'user_phone.numeric' => 'El teléfono debe ser un número',
            'user_phone.digits' => 'El teléfono debe tener 9 dígitos',
            'card_name.required' => 'El nombre de la tarjeta es obligatorio',
            'card_name.max' => 'El nombre de la tarjeta largo',
            'card_number.required' => 'El número de la tarjeta es obligatorio',
            'card_number.numeric' => 'El número de la tarjeta debe ser un número',
            'card_number.digits' => 'El número de la tarjeta debe tener 16 dígitos',
            'card_expire_month.required' => 'La fecha de caducidad es obligatoria',
            'card_expire_month.numeric' => 'El mes de caducidad debe ser un número',
            'card_expire_year.required' => 'La fecha de caducidad es obligatoria',
            'card_expire_year.numeric' => 'El año de caducidad debe ser un número',
            'card_cvv.required' => 'El CVV es obligatorio',
            'card_cvv.numeric' => 'El CVV debe ser un número',
            'card_cvv.digits' => 'El CVV debe tener 3 dígitos'
        ];
    }

    public function createOrder()
    {
        $this->validate();

        $shopping_cart = \Cart::session(Auth::user()->id);

        $cart_total = $shopping_cart->getTotal();
        $shipping_cost = 3.90;
        $total_price = $cart_total + $shipping_cost;

        $new_order = Order::create([
            'user_id' => Auth::user()->id,
            'user_name' => $this->user_name,
            'user_email' => $this->user_email,
            'user_address' => $this->user_address,
            'user_phone' => $this->user_phone,
            'status' => 'pending',
            'total_price' => $total_price
        ]);

        $cart_content = $shopping_cart->getContent()->sort();

        foreach ($cart_content as $product) {
            OrderDetail::create([
                'order_id' => $new_order->id,
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' => $product->quantity,
                'price' => $product->price * $product->quantity
            ]);
        }

        // Clear the Cart
        $shopping_cart->clear();

        // Session::put('new_order_id', $new_order->id);

        session(['new_order_id' => $new_order->id]);

        return redirect()->route('cart.order.done');
    }

    public function productDetails($product_id)
    {
        return redirect()->route('catalog.show', ['product_id' => $product_id]);
    }

    public function mount()
    {
        $shopping_cart = \Cart::session(Auth::user()->id);

        if ($shopping_cart->isEmpty()) {
            return redirect()->route('cart');
        }

        $this->user_name = Auth::user()->name;
        $this->user_email = Auth::user()->email;
        $this->user_phone = Auth::user()->phone;
        $this->user_address = Auth::user()->address;
    }

    public function render()
    {
        $shopping_cart = \Cart::session(Auth::user()->id);
        $cart_content = $shopping_cart->getContent()->sort();
        $cart_total_quantity = $shopping_cart->getTotalQuantity();
        $cart_total = $shopping_cart->getTotal();
        $shipping_cost = 3.90;

        return view('livewire.client.cart.shopping-cart-order', [
            'cart_content' => $cart_content,
            'cart_total_quantity' => $cart_total_quantity,
            'cart_total' => $cart_total,
            'shipping_cost' => $shipping_cost,
            'user_name' => Auth::user()->name
        ]);
    }
}
