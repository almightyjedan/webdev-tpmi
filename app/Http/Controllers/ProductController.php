<?php

namespace App\Http\Controllers;

use App\Models\PumpType;
use App\Models\DetailPump;
use App\Models\CategoryPump;
use App\Models\Industry;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryPump::query()
            ->when($request->type, function ($query, $type) {
                return $query->whereHas('detailPumps', function ($q) use ($type) {
                    $q->where('pump_type_id', $type);
                });
            })
            ->when($request->industry, function ($query, $industry) {
                return $query->whereHas('detailPumps.industries', function ($q) use ($industry) {
                    $q->where('industries.id', $industry);
                });
            })
            ->get();

        $types = PumpType::all();
        $industries = Industry::all();

        return view('products.index', compact('categories', 'types', 'industries'));
    }

    public function showByType($slug)
    {
        $type = PumpType::where('slug', $slug)->firstOrFail();
        
        $productsBySeries = DetailPump::where('pump_type_id', $type->id)
            ->with('categoryPump')
            ->get()
            ->groupBy('category_pump_id');

        return view('products.index', compact('type', 'productsBySeries'));
    }

    public function show(CategoryPump $category)
    {
        $category->load(['detailPumps.industries', 'detailPumps.pumpType']);
        
        return view('products.show', compact('category'));
    }
}