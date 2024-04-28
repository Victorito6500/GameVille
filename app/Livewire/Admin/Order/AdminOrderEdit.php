<?php

namespace App\Livewire\Admin\Order;

use App\Livewire\Alert\SuccessAlert;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Livewire\Component;

class AdminOrderEdit extends Component
{
    public $order_id;

    // Flag for modal
    public $confirmOrderStatus;

    public $status_action;

    public function showConfirmModal($status_action)
    {
        $this->status_action = $status_action;
        $this->confirmOrderStatus = true;
    }

    public function cancelOrder()
    {
        $order_details = OrderDetail::where('order_id', $this->order_id)->get();

        foreach ($order_details as $product) {
            $productDB = Product::find($product->product_id);

            // Add to stock the quantity in Cart
            $productDB->stock += $product->quantity;
            $productDB->save();
        }

        $order = Order::find($this->order_id);
        $order->status = 'cancelled';
        $order->save();

        $this->confirmOrderStatus = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El pedido se ha cancelado correctamente!')->to(SuccessAlert::class);
    }

    public function completeOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = 'complete';
        $order->save();

        $this->confirmOrderStatus = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El pedido se ha confirmado correctamente!')->to(SuccessAlert::class);
    }

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order_details = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order_details.quantity', 'order_details.price as total_price', 'products.*')
            ->where('order_details.order_id', $this->order_id)
            ->get();

        $order = Order::find($this->order_id);
        $shipping_cost = 3.90;

        return view('livewire.admin.order.admin-order-edit', [
            'order_details' => $order_details,
            'order' => $order,
            'shipping_cost' => $shipping_cost
        ]);
    }
}
