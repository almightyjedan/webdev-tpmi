<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PumpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{category:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/api/pump-data', [PumpController::class, 'getPumpData'])->name('api.pump.data');

Route::get('/api/proxy/ceno-data', [PumpController::class, 'getCenoData'])->name('proxy.ceno.data');

Route::post('/api/proxy/ceno-save', [PumpController::class, 'saveToSheets'])->name('proxy.ceno.save');

Route::get('/pump-selector', [PumpController::class, 'index'])->name('pumpselector.index');

Route::get('/pump-selector/cen-o', [PumpController::class, 'cenO'])->name('pumpselector.ceno');

Route::get('/pump-selector/cen-sv', [PumpController::class, 'cenSv'])->name('pumpselector.censv');