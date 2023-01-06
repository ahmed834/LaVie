<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NearbyshopController;

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

Route::get('/', function () {
    return view('products/create');
});

//products
Route::get('/products', [ProductController::class , 'index' ] );
Route::get('/products/create', [ProductController::class , 'create' ] );
Route::get('/products/{product}', [ProductController::class , 'show' ] );
Route::post('/products', [ProductController::class , 'store' ] );
Route::get('/products/{product}/edit', [ProductController::class , 'edit' ] );
Route::put('/products/{product}', [ProductController::class , 'update' ] );
Route::delete('/products/{product}', [ProductController::class , 'destroy' ] );



//users
Route::get('/users', [UserController::class , 'index' ] );
Route::delete('/users/{user}', [UserController::class , 'destroy' ] );


//orders
Route::get('/orders', [OrderController::class , 'index' ] );
Route::delete('/orders/{order}', [OrderController::class , 'destroy' ] );


//Nearby Shops
Route::get('/NearbyShops', [NearbyshopController::class , 'index' ] );
Route::get('/Nearbyshops/create', [NearbyshopController::class , 'create' ] );
Route::get('/Nearbyshops/{Nearbyshop}', [NearbyshopController::class , 'show' ] );
Route::post('/Nearbyshops', [NearbyshopController::class , 'store' ] );
Route::get('/Nearbyshops/{Nearbyshop}/edit', [NearbyshopController::class , 'edit' ] );
Route::put('/Nearbyshops/{Nearbyshop}', [NearbyshopController::class , 'update' ] );
Route::delete('/Nearbyshops/{Nearbyshop}', [NearbyshopController::class , 'destroy' ] );