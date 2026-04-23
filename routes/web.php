<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PumpController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\News;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    // Latest Projects
    $projects = Project::latest()->take(6)->get();

    // Recent News
    $news = News::withCount('comments')
                ->latest()
                ->get();

    return view('welcome', [
        'projects' => $projects,
        'news' => $news
    ]);
});

// Produts
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{category:slug}', [ProductController::class, 'show'])->name('products.show');

// Pump Selector
Route::get('/api/pump-data', [PumpController::class, 'getPumpData'])->name('api.pump.data');
Route::get('/pump-selector', [PumpController::class, 'index'])->name('pumpselector.index');
Route::get('/pump-selector/cen-o', [PumpController::class, 'cenO'])->name('pumpselector.ceno');
Route::get('/api/proxy/ceno-data', [PumpController::class, 'getCenoData'])->name('proxy.ceno.data');
Route::post('/api/proxy/ceno-save', [PumpController::class, 'saveToSheets'])->name('proxy.ceno.save');
Route::get('/pump-selector/cen-sv', [PumpController::class, 'cenSv'])->name('pumpselector.censv');
Route::get('/api/proxy/censv-data', [PumpController::class, 'getCensvData'])->name('proxy.censv.data');
Route::post('/api/proxy/censv-save', [PumpController::class, 'saveToSheetsCensv'])->name('proxy.censv.save');