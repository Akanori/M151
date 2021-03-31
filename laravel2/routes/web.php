<?php

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

Route::get('/', [\App\Http\Controllers\ProductController::class, 'list']);

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'list']);

Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'detail']);

Route::get('/addtocart/{id}', [\App\Http\Controllers\OrderController::class, 'addtocart']);

Route::get('/cart', [\App\Http\Controllers\OrderController::class, 'cart']);

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'order']);

Route::get('/completeOrder', [\App\Http\Controllers\OrderController::class, 'completeOrder']);

Route::get('/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout']);

Route::post('/loginUser', [\App\Http\Controllers\UserController::class, 'loginUser']);

Route::get('/register', [\App\Http\Controllers\UserController::class, 'register']);

Route::post('/createUser', [\App\Http\Controllers\UserController::class, 'createUser']);

Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile']);
