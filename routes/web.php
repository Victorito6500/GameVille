<?php

use App\Livewire\Admin\Category\AdminCategories;
use App\Livewire\Admin\Category\AdminCategoryCreate;
use App\Livewire\Admin\Category\AdminCategoryEdit;
use App\Livewire\Admin\Genre\AdminGenreCreate;
use App\Livewire\Admin\Genre\AdminGenreEdit;
use App\Livewire\Admin\Genre\AdminGenres;
use App\Livewire\Admin\Home\AdminHome;
use App\Livewire\Admin\Order\AdminOrders;
use App\Livewire\Admin\Platform\AdminPlatforms;
use App\Livewire\Admin\Product\AdminProducts;
use App\Livewire\Admin\Order\AdminOrderEdit;
use App\Livewire\Admin\Platform\AdminPlatformCreate;
use App\Livewire\Admin\Platform\AdminPlatformEdit;
use App\Livewire\Admin\Product\AdminProductCreate;
use App\Livewire\Admin\Product\AdminProductEdit;
use App\Livewire\Admin\User\AdminUserCreate;
use App\Livewire\Admin\User\AdminUserEdit;
use App\Livewire\Admin\User\AdminUsers;
use App\Livewire\Client\Catalog\ProductsCatalog;
use App\Livewire\Client\Cart\ShoppingCart;
use App\Livewire\Client\Cart\ShoppingCartOrder;
use App\Livewire\Client\Home\Home;
use App\Livewire\Client\Order\OrderDetail;
use App\Livewire\Client\Order\OrderDone;
use App\Livewire\Client\Order\Orders;
use App\Livewire\Client\Product\ProductDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Home
Route::get('/', Home::class)->name('home');

// Catalog
Route::match(['GET', 'POST'], '/catalog', ProductsCatalog::class)->name('catalog');
Route::get('/catalog/{product_id}', ProductDetail::class)->name('catalog.show');

// Auth Client Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'client'
])->group(function () {
    // User Orders Route
    Route::get('/user/my-orders', Orders::class)->name('profile.orders');
    Route::get('/user/my-orders/{order_id}', OrderDetail::class)->name('profile.order.detail');

    // Shopping Cart Routes
    Route::get('/cart', ShoppingCart::class)->name('cart');
    Route::get('/cart/order', ShoppingCartOrder::class)->name('cart.order');
    Route::get('/cart/order/done', OrderDone::class)->name('cart.order.done');
});

// Admin Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    // Home
    Route::get('/admin', AdminHome::class)->name('admin.home');

    // Users
    Route::get('/admin/users', AdminUsers::class)->name('admin.user');
    Route::get('/admin/users/{user_id}', AdminUserEdit::class)->name('admin.user.edit');
    Route::get('/admin/users/create/{is_admin}', AdminUserCreate::class)->name('admin.user.create');

    // Orders
    Route::get('/admin/orders', AdminOrders::class)->name('admin.order');
    Route::get('/admin/orders/{order_id}', AdminOrderEdit::class)->name('admin.order.edit');

    // Products
    Route::get('/admin/products', AdminProducts::class)->name('admin.product');
    Route::get('/admin/products/{product_id}', AdminProductEdit::class)->where('product_id', '[0-9]+')->name('admin.product.edit');
    Route::get('/admin/products/create', AdminProductCreate::class)->name('admin.product.create');


    // Categories
    Route::get('/admin/categories', AdminCategories::class)->name('admin.category');
    Route::get('/admin/categories/{category_id}', AdminCategoryEdit::class)->where('category_id', '[0-9]+')->name('admin.category.edit');
    Route::get('/admin/categories/create', AdminCategoryCreate::class)->name('admin.category.create');

    // Genres
    Route::get('/admin/genres', AdminGenres::class)->name('admin.genre');
    Route::get('/admin/genres/{genre_id}', AdminGenreEdit::class)->where('genre_id', '[0-9]+')->name('admin.genre.edit');
    Route::get('/admin/genres/create', AdminGenreCreate::class)->name('admin.genre.create');


    // Platforms
    Route::get('/admin/platforms', AdminPlatforms::class)->name('admin.platform');
    Route::get('/admin/platforms/{platform_id}', AdminPlatformEdit::class)->where('platform_id', '[0-9]+')->name('admin.platform.edit');
    Route::get('/admin/platforms/create', AdminPlatformCreate::class)->name('admin.platform.create');
});
