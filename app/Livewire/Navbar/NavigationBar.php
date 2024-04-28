<?php

namespace App\Livewire\Navbar;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class NavigationBar extends Component
{
    public $cart_total_quantity;

    // Flags for client routes
    public $active_home = false;
    public $active_catalog = false;

    // Flags for admin routes
    public $active_admin_home = false;
    public $active_users = false;
    public $active_orders = false;
    public $active_products = false;
    public $active_categories = false;
    public $active_genres = false;
    public $active_platforms = false;

    #[On('cartRefresh')]
    public function refreshCartQuantity()
    {
        $this->cart_total_quantity = \Cart::session(Auth::user()->id)->getTotalQuantity();
    }

    public function mount()
    {
        if (Auth::check() && Auth::user()->isAdmin) {
            $this->isAdminMount();
        } else {
            $this->isClientMount();
        }
    }

    public function render()
    {
        if (Auth::check() && Auth::user()->isAdmin != 1) {
            $this->cart_total_quantity = \Cart::session(Auth::user()->id)->getTotalQuantity();
        }

        return view('livewire.navbar.navigation-bar');
    }

    private function isClientMount()
    {
        if (request()->routeIs('home')) {
            $this->active_home = true;
        }

        if (request()->routeIs('catalog')) {
            $this->active_catalog = true;
        }
    }

    private function isAdminMount()
    {
        if (request()->routeIs('admin.home')) {
            $this->active_home = true;
        }

        if (request()->routeIs('admin.order')) {
            $this->active_orders = true;
        }

        if (request()->routeIs('admin.product')) {
            $this->active_products = true;
        }

        if (request()->routeIs('admin.category')) {
            $this->active_products = true;
            $this->active_categories = true;
        }

        if (request()->routeIs('admin.genre')) {
            $this->active_products = true;
            $this->active_genres = true;
        }

        if (request()->routeIs('admin.platform')) {
            $this->active_products = true;
            $this->active_platforms = true;
        }

        if (request()->routeIs('admin.user')) {
            $this->active_users = true;
        }
    }
}
