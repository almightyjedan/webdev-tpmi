<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PumpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{category:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/pump-selector', [PumpController::class, 'index'])->name('pumpselector.index');

Route::get('/pump-selector/cen-o', [PumpController::class, 'cenO'])->name('pumpselector.ceno');

Route::get('/pump-selector/cen-sv', [PumpController::class, 'cenSv'])->name('pumpselector.censv');