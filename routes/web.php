<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PumpController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\News;
use App\Models\Industry;
use App\Models\Banner;
use App\Models\Gallery;

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

    // Data untuk Chart Donut
    $industries = Industry::withCount('projects')
            ->get()
            ->filter(function ($industry) {
                return $industry->projects_count > 0;
            });

    // Banner
    $banner = Banner::first();

    return view('welcome', [
        'projects' => $projects,
        'news' => $news,
        'chartLabels' => $industries->pluck('name')->toArray(),
        'chartData' => $industries->pluck('projects_count')->toArray(),
        'banner' => $banner,
    ]);
});

// Gallery
Route::get('/gallery', function () {
    return view('gallery.index', [
        'videos' => Gallery::where('type', 'video')->latest()->paginate(9, ['*'], 'vpage'),
        'images' => Gallery::where('type', 'image')->latest()->paginate(30, ['*'], 'ipage'),
    ]);
})->name('gallery.index');

Route::get('/gallery/{gallery}', function (Gallery $gallery) {
    return view('gallery.show', compact('gallery'));
})->name('gallery.show');

// Produts
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{category:slug}', [ProductController::class, 'show'])->name('products.show');

// Pump Selector
Route::get('/api/pump-data', [PumpController::class, 'getPumpData'])->name('api.pump.data');
Route::get('/pump-selector', [PumpController::class, 'index'])->name('pumpselector.index');

// CEN
Route::get('/pump-selector/cen', [PumpController::class, 'cen'])->name('pumpselector.cen');
Route::get('/api/proxy/cen-data', [PumpController::class, 'getCenData'])->name('proxy.cen.data');
Route::post('/api/proxy/cen-save', [PumpController::class, 'saveToSheetsCen'])->name('proxy.cen.save');

// CEN-O
Route::get('/pump-selector/cen-o', [PumpController::class, 'cenO'])->name('pumpselector.ceno');
Route::get('/api/proxy/ceno-data', [PumpController::class, 'getCenoData'])->name('proxy.ceno.data');
Route::post('/api/proxy/ceno-save', [PumpController::class, 'saveToSheets'])->name('proxy.ceno.save');

// CEN-SV
Route::get('/pump-selector/cen-sv', [PumpController::class, 'cenSv'])->name('pumpselector.censv');
Route::get('/api/proxy/censv-data', [PumpController::class, 'getCensvData'])->name('proxy.censv.data');
Route::post('/api/proxy/censv-save', [PumpController::class, 'saveToSheetsCensv'])->name('proxy.censv.save');