<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\AiController;

Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/products/{product}', [StoreController::class, 'show'])->name('store.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/item/{item}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/item/{item}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/api/chat', [AiController::class, 'chat'])->name('api.chat');
