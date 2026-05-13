<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PumpController;
use App\Http\Controllers\PumpControllerHide;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\News;
use App\Models\Industry;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Qhse;

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

// Corporate Data
Route::get('/corporate-data', function () {
    $corporate = \App\Models\CorporatePages::first(); 
    return view('about.corporate-data', compact('corporate'));
})->name('corporate-data');

// QHSE
Route::get('/qhse', function () {
    $qhse = \App\Models\Qhse::first(); 
    return view('qhse.index', compact('qhse'));
})->name('qhse.index');

// Gallery
Route::get('/gallery', function () {
    return view('media/gallery.index', [
        'videos' => Gallery::where('type', 'video')->latest()->paginate(9, ['*'], 'vpage'),
        'images' => Gallery::where('type', 'image')->latest()->paginate(30, ['*'], 'ipage'),
    ]);
})->name('gallery.index');

Route::get('/gallery/{gallery}', function (Gallery $gallery) {
    return view('gallery.show', compact('gallery'));
})->name('gallery.show');

// Press Release / News
Route::get('/press-release', function () {
    $news = News::latest()->get();
    return view('media.press-release.index', compact('news'));
})->name('press-release.index');

Route::get('/press-release/{news:slug}', function (News $news) {
    return view('media.press-release.show', compact('news'));
})->name('press-release.show');

// Recent Project
Route::get('/recent-project', function () {
    $projects = \App\Models\Project::latest()->get();
    return view('media.recent-project.index', compact('projects'));
})->name('recent-project.index');

Route::get('/recent-project/{project}', function (\App\Models\Project $project) {
    return view('media.recent-project.show', compact('project'));
})->name('recent-project.show');

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

// Pump Selector Hide
Route::prefix('hide')->group(function () {
    
    // Main Index hide
    Route::get('/pump-selector', [PumpControllerHide::class, 'index'])->name('hide.pumpselector.index');
    
    // API Data hide
    Route::get('/api/pump-data', [PumpControllerHide::class, 'getPumpData'])->name('hide.api.pump.data');

    // CEN hide
    Route::get('/pump-selector/cen', [PumpControllerHide::class, 'cen'])->name('hide.pumpselector.cen');
    Route::get('/api/proxy/cen-data', [PumpControllerHide::class, 'getCenData'])->name('hide.proxy.cen.data');
    Route::post('/api/proxy/cen-save', [PumpControllerHide::class, 'saveToSheetsCen'])->name('hide.proxy.cen.save');

    // CEN-O hide
    Route::get('/pump-selector/cen-o', [PumpControllerHide::class, 'cenO'])->name('hide.pumpselector.ceno');
    Route::get('/api/proxy/ceno-data', [PumpControllerHide::class, 'getCenoData'])->name('hide.proxy.ceno.data');
    Route::post('/api/proxy/ceno-save', [PumpControllerHide::class, 'saveToSheets'])->name('hide.proxy.ceno.save');

    // CEN-SV hide
    Route::get('/pump-selector/cen-sv', [PumpControllerHide::class, 'cenSv'])->name('hide.pumpselector.censv');
    Route::get('/api/proxy/censv-data', [PumpControllerHide::class, 'getCensvData'])->name('hide.proxy.censv.data');
    Route::post('/api/proxy/censv-save', [PumpControllerHide::class, 'saveToSheetsCensv'])->name('hide.proxy.censv.save');
});