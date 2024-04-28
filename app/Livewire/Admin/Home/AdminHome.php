<?php

namespace App\Livewire\Admin\Home;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AdminHome extends Component
{
    public function render()
    {
        // Sales info
        $total_orders = Order::all();
        $pending_orders = Order::where('status', 'pending')->get();
        $complete_orders = Order::where('status', 'complete')->get();
        $cancelled_orders = Order::where('status', 'cancelled')->get();
        $total_income = $total_orders->where('status', 'complete')->sum('total_price');

        // Users info
        $client_users = User::where('isAdmin', 0)->get();
        $admin_users = User::where('isAdmin', 1)->get();

        // Products info
        $stock_products = Product::where('stock', '>', 0)->get();
        $outofstock_products = Product::where('stock', '=<', 0)->get();

        // Orders
        $last_orders = Order::orderBy('created_at', 'desc')->limit(6)->get();

        // Products
        $last_products = Product::orderBy('created_at', 'desc')->limit(6)->get();


        return view('livewire.admin.home.admin-home', [
            'total_orders' => $total_orders,
            'pending_orders' => $pending_orders,
            'complete_orders' => $complete_orders,
            'cancelled_orders' => $cancelled_orders,
            'total_income' => $total_income,
            'client_users' => $client_users,
            'admin_users' => $admin_users,
            'stock_products' => $stock_products,
            'outofstock_products' => $outofstock_products,
            'last_orders' => $last_orders,
            'last_products' => $last_products
        ]);
    }
}
