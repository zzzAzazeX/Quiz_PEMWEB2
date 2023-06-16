<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/available', [ProductController::class, 'availableProducts']);
Route::get('/products/unavailable', [ProductController::class, 'unavailableProducts']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::get('/products/{id}/update-stock', [ProductController::class, 'updateStockForm'])->name('products.updateStockForm');
Route::put('/products/{id}/stock', [ProductController::class, 'updateStock'])->name('products.updateStock');
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

