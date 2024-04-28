<?php

namespace App\Livewire\Admin\Order;

use App\Livewire\Alert\SuccessAlert;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrders extends Component
{
    use WithPagination;

    // Filter wire:model
    public $searchOrderFilter;

    // Flag for modal
    public $confirmOrderStatus;

    public $selected_order_id;
    public $status_action;

    // Reset page for search filter
    public function updatingSearchOrderFilter()
    {
        $this->resetPage();
    }

    public function showConfirmModal($order_id, $status_action)
    {
        $this->selected_order_id = $order_id;
        $this->status_action = $status_action;
        $this->confirmOrderStatus = true;
    }

    public function cancelOrder()
    {
        $order_details = OrderDetail::where('order_id', $this->selected_order_id)->get();

        foreach ($order_details as $product) {
            $productDB = Product::find($product->product_id);

            // Add to stock the quantity in Cart
            $productDB->stock += $product->quantity;
            $productDB->save();
        }

        $order = Order::find($this->selected_order_id);
        $order->status = 'cancelled';
        $order->save();

        $this->confirmOrderStatus = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El pedido se ha cancelado correctamente!')->to(SuccessAlert::class);
    }

    public function completeOrder()
    {
        $order = Order::find($this->selected_order_id);
        $order->status = 'complete';
        $order->save();

        $this->confirmOrderStatus = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El pedido se ha confirmado correctamente!')->to(SuccessAlert::class);
    }

    public function mount()
    {
        $this->searchOrderFilter = '';

        $this->confirmOrderStatus = false;

        $this->selected_order_id = null;
        $this->status_action = null;
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $orders = Order::where('id', 'like', '%' . $this->searchOrderFilter . '%')
            ->paginate(8);

        return view('livewire.admin.order.admin-orders', [
            'orders' => $orders
        ]);
    }
}
