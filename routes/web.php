<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockMovementController;

Route::resource('products', ProductController::class);
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::resource('stock_movements', StockMovementController::class);

Route::get('/', function () {
    return view('welcome');
});
