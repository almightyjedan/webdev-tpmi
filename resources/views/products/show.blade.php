<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Torishima Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-slate-900">

    <nav class="bg-white border-b py-6 px-8 flex justify-between items-center">
        <a href="/" class="text-2xl font-black text-blue-900 italic">TORISHIMA</a>
        <div class="space-x-6 text-sm font-bold uppercase">
            <a href="/" class="text-gray-400">Home</a>
            <a href="/products" class="text-blue-900 border-b-2 border-red-600">Products</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-12">
        <div class="mb-8 text-[10px] font-bold uppercase tracking-widest text-slate-400">
            <a href="/products" class="hover:text-red-600 transition">Products</a> 
            <span class="mx-2">/</span> 
            <span class="text-slate-900">{{ $category->name }}</span>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
            <div class="aspect-square bg-slate-50 rounded-2xl flex items-center justify-center p-12 border border-slate-100">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="max-w-full max-h-full object-contain">
                @else
                    <span class="text-slate-300 font-bold uppercase tracking-widest text-xs">No Image Available</span>
                @endif
            </div>
            <div>
                <h1 class="text-5xl font-black text-blue-900 uppercase tracking-tighter mb-4">{{ $category->name }}</h1>
                <p class="text-slate-500 leading-relaxed text-lg mb-6">
                    Torishima {{ $category->name }} series dirancang untuk memberikan performa maksimal dan efisiensi energi tinggi di berbagai aplikasi industri.
                </p>
                <div class="flex gap-2 flex-wrap">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-[10px] font-black uppercase rounded">Industrial Grade</span>
                    <span class="px-3 py-1 bg-red-50 text-red-700 text-[10px] font-black uppercase rounded">High Durability</span>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-12">
            <h2 class="text-2xl font-black text-blue-900 uppercase tracking-tight mb-8">Available Models</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($category->detailPumps as $pump)
                    <div class="border border-slate-100 p-6 rounded-xl hover:shadow-xl hover:border-blue-200 transition group">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-900 transition">{{ $pump->model_name }}</h3>
                                <p class="text-xs text-slate-400 font-medium italic">{{ $pump->pumpType->name }}</p>
                            </div>
                            <span class="text-[10px] font-bold bg-slate-100 px-2 py-1 rounded uppercase">SKU: {{ Str::random(5) }}</span>
                        </div>
                        
                        <p class="text-sm text-slate-500 mb-6 line-clamp-2 italic">
                            {{ $pump->description ?? 'No description available for this specific model.' }}
                        </p>

                        <div class="flex flex-wrap gap-2">
                            @foreach($pump->industries as $industry)
                                <span class="text-[9px] font-bold border border-slate-200 text-slate-500 px-2 py-0.5 rounded-full uppercase tracking-wider bg-white">
                                    {{ $industry->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center py-10 text-slate-400 italic">Belum ada model detail untuk kategori ini.</p>
                @endforelse
            </div>
        </div>
    </main>

</body>
</html>