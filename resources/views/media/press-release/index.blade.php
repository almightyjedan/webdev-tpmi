<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Press Release - Torishima</title>
</head>
<body class="bg-gray-50">
    @include('layouts.partials.navbar')

    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                    Recent news
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                </h2>
            </div>
        </div>
            
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $n)
            <div class="bg-white border border-gray-200 flex flex-col h-full shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] bg-gray-100 overflow-hidden">
                    @if($n->image)
                        <img src="{{ asset('storage/' . $n->image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs uppercase font-bold tracking-widest">
                            [PHOTO]
                        </div>
                    @endif
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h4 class="text-gray-800 text-lg font-bold leading-tight mb-3 line-clamp-2">
                        {{ $n->title }}
                    </h4>

                    <div class="flex items-center text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-4 space-x-4">
                        <span><i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($n->posted_at)->format('F d, Y') }}</span>
                        <span><i class="far fa-comment mr-1"></i> 0 Comments</span>
                    </div>

                    <p class="text-sm text-gray-500 mb-6 line-clamp-3">
                        {{ Str::limit(strip_tags($n->description), 120) }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ route('press-release.show', $n->slug) }}" class="inline-block border border-[#5D5A88] text-[#5D5A88] px-6 py-2 text-[10px] font-bold uppercase tracking-widest hover:bg-[#5D5A88] hover:text-white transition-all duration-300">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @include('layouts.partials.footer')
</body>
</html>