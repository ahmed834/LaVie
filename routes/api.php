<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\NearbyshopController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});



Route::middleware( ['jwt.verify'] )->group(function() {

    //Posts
Route::get('/posts' , [PostController::class,"index"]);
Route::get('/post/{id}' , [PostController::class,"show"]);  


Route::post('/posts' , [PostController::class,"store"]);
Route::post('/post/{id}' , [PostController::class,"update"]);
Route::post('/posts/{id}' , [PostController::class,"destroy"] );




//make order
Route::post('/orders' , [OrderController::class,"store"]);



});


//Products
Route::get('/products' , [ProductController::class,"index"]);

//Nearbyshops
Route::get('/Nearbyshops' , [NearbyshopController::class,"index"]);

