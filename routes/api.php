<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ShippingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'api.'], function () {
    Route::apiResource('cart', CartController::class);

    Route::group(['middleware' => ['auth:api'], 'prefix' => 'products', 'as' => 'products.'], function () {
        Route::apiResource('categories', CategoryController::class);
    });

    Route::get('/shippings/get-cities', [ShippingController::class, 'getCities'])->name('shipping.cities');
    Route::get('/shippings/get-prices', [ShippingController::class, 'getPrices'])->name('shipping.prices');
});
