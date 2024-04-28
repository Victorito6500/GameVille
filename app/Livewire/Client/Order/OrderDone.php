<?php

namespace App\Livewire\Client\Order;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class OrderDone extends Component
{
    public function mount()
    {
        // if (!Session::has('new_order_id')) {
        //     return redirect()->route('cart');
        // }

        // Session::forget('new_order_id');

        if (!session()->has('new_order_id')) {
            return redirect()->route('home');
        }

        session()->forget('new_order_id');
    }

    public function render()
    {
        return view('livewire.client.order.order-done');
    }
}
