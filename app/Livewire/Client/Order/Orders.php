<?php

namespace App\Livewire\Client\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.client.order.orders', [
            'orders' => $orders
        ]);
    }
}
