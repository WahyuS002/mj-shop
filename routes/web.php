<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\Payments\PaypalController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ControllersProductController::class, 'home'])->name('home');
Route::get('/product/{product}/{slug}', [ControllersProductController::class, 'product'])->name('product');

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/', [ControllersProductController::class, 'shop'])->name('browse');
});

Route::resource('cart', CartController::class)->only(['index', 'store', 'update']);

Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('dashboard', [ControllersDashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ControllersProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ControllersProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ControllersProfileController::class, 'update'])->name('update');

        Route::resource('address', AddressController::class);
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
        Route::get('/show/{status}', [OrderController::class, 'status'])->name('status');
    });

    Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::group(['prefix' => 'paypal', 'as' => 'paypal.'], function () {
            Route::get('/callback', [PaypalController::class, 'callback'])->name('callback');
            Route::get('/{order}', [PaypalController::class, 'create'])->name('create');
        });

        Route::get('/success', [PaymentController::class, 'success'])->name('success');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::resource('brands', BrandController::class)->except(['create', 'edit']);
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    });
    Route::resource('products', ProductController::class);

    Route::get('/orders/status/{status}', [AdminOrderController::class, 'status'])->name('orders.status');
    Route::resource('orders', AdminOrderController::class)->except(['create', 'edit']);
});

require __DIR__ . '/auth.php';
