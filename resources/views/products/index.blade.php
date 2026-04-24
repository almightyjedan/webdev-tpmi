<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Torishima Pump Mfg. Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    @include('layouts.partials.navbar')

    <main class="max-w-7xl mx-auto px-4 py-12">
        
        <form action="{{ route('products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Select by Pump Type</label>
                <select name="type" onchange="this.form.submit()" class="w-full border-2 border-gray-100 p-3 text-sm font-bold outline-none focus:border-blue-900 transition">
                    <option value="">All Pump Types</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Select by Industry</label>
                <select name="industry" onchange="this.form.submit()" class="w-full border-2 border-gray-100 p-3 text-sm font-bold outline-none focus:border-blue-900 transition">
                    <option value="">All Industries</option>
                    @foreach($industries as $industry)
                        <option value="{{ $industry->id }}" {{ request('industry') == $industry->id ? 'selected' : '' }}>
                            {{ $industry->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @forelse($categories as $category)
                <a href="{{ route('products.show', $category->slug) }}" class="group block">
                    <div class="aspect-square bg-slate-50 border border-slate-100 rounded-xl overflow-hidden flex items-center justify-center p-6 group-hover:border-blue-200 group-hover:bg-white transition duration-300">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="max-w-full max-h-full object-contain transform group-hover:scale-110 transition duration-500">
                        @else
                            <div class="text-slate-300 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-[10px] font-bold uppercase tracking-widest">No Image</span>
                            </div>
                        @endif
                    </div>
                    <h3 class="mt-4 text-sm font-black text-slate-800 uppercase tracking-tight group-hover:text-blue-900 transition">
                        {{ $category->name }}
                    </h3>
                    <p class="text-[10px] text-slate-400 font-bold uppercase">Torishima Series</p>
                </a>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 font-bold italic tracking-widest">No products found for this filter.</p>
                </div>
            @endforelse
        </div>

    </main>

    @include('layouts.partials.footer')
</body>
</html>