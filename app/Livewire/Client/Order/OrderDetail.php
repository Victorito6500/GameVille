<?php

namespace App\Livewire\Client\Order;

use App\Models\Order;
use App\Models\OrderDetail as ModelsOrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order_id;

    public function cancelOrder()
    {
        $logged_user_id = Auth::user()->id;
        $order_details = ModelsOrderDetail::where('order_id', $this->order_id)
            ->where('user_id', $logged_user_id)
            ->get();

        foreach ($order_details as $product) {
            $productDB = Product::find($product->product_id);

            // Add to stock the quantity in Cart
            $productDB->stock += $product->quantity;
            $productDB->save();
        }

        $order = Order::find($this->order_id);
        $order->status = 'cancelled';
        $order->save();
    }

    public function confirmOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = 'complete';
        $order->save();
    }

    public function productDetails($product_id)
    {
        return redirect()->route('catalog.show', ['product_id' => $product_id]);
    }

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $logged_user_id = Auth::user()->id;
        $order_details = ModelsOrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order_details.quantity', 'order_details.price as total_price', 'products.*')
            ->where('order_details.order_id', $this->order_id)
            ->where('order_details.user_id', $logged_user_id)
            ->get();

        $order = Order::find($this->order_id);
        $shipping_cost = 3.90;

        return view('livewire.client.order.order-detail', [
            'order_details' => $order_details,
            'order' => $order,
            'shipping_cost' => $shipping_cost
        ]);
    }
}
