<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QHSE - Torishima Pumps Indonesia</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .hero-gradient {
            background: linear-gradient(90deg, #7C7FFF 0%, #7C7FFF 100%);
        }
    </style>
</head>
<body class="bg-white">

    @include('layouts.partials.navbar')

    @if($qhse)
        <div class="w-full px-6 mt-6">
            <div class="relative w-full">
                @if($qhse->hero_image)
                    <img src="{{ asset('storage/' . $qhse->hero_image) }}" class="w-full h-auto block z-0">
                @else
                    <div class="w-full h-[400px] hero-gradient"></div>
                @endif
            </div>
        </div>

        <main class="container mx-auto px-4 py-12 max-w-6xl">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Quality Health Safety Environment
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>

            <div class="prose prose-slate max-w-none text-gray-500 leading-relaxed mb-16 text-justify">
                {!! $qhse->intro_text !!}
            </div>

            <div x-data="{ active: null }" class="mb-20 space-y-2 w-full max-w-none">
                @if($qhse->content_blocks)
                    @foreach($qhse->content_blocks as $index => $block)
                    <div class="border-b border-gray-100">
                        <button 
                            @click="active === {{ $index }} ? active = null : active = {{ $index }}"
                            class="w-full flex items-center py-4 px-2 text-left group"
                        >
                            <i class="fa-solid fa-plus text-xs text-gray-400 mr-4 transition-transform" :class="active === {{ $index }} ? 'rotate-45' : ''"></i>
                            <span class="text-lg font-bold text-gray-700 uppercase tracking-wide group-hover:text-blue-600">
                                {{ $block['title'] }}
                            </span>
                        </button>
                        
                        <div x-show="active === {{ $index }}" x-collapse x-cloak>
                            <div class="p-6 text-gray-500 prose max-w-none leading-7 bg-gray-50 rounded-md mb-4 italic">
                                {!! $block['content'] !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            {{-- Latest Activity --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Latest Activity
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-1">
                    @if($qhse->gallery_images)
                        @foreach($qhse->gallery_images as $img)
                            <div class="aspect-square bg-gray-100 overflow-hidden">
                                <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover hover:opacity-80 transition">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Alur Berkunjung --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Alur Berkunjung Ke TPMI
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
                @if($qhse->video_url)
                    <div class="w-full aspect-video rounded-lg overflow-hidden shadow-xl mb-12 bg-black">
                        @php 
                            if(str_contains($qhse->video_url, 'vimeo')) {
                                preg_match('/vimeo\.com\/([0-9]+)/', $qhse->video_url, $vmatch);
                                $embed_url = "https://player.vimeo.com/video/" . ($vmatch[1] ?? '');
                            } else {
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $qhse->video_url, $ymatch);
                                $embed_url = "https://www.youtube.com/embed/" . ($ymatch[1] ?? '');
                            }
                        @endphp
                        <iframe src="{{ $embed_url }}" class="w-full h-full" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif

                @if($qhse->infographic_image)
                    <div class="flex justify-center mt-10">
                        <img src="{{ asset('storage/' . $qhse->infographic_image) }}" class="max-w-full h-auto rounded-lg">
                    </div>
                @endif
            </div>
        </main>
    @else
        <div class="container mx-auto px-4 py-32 text-center">
            <i class="fa-solid fa-folder-open text-gray-200 text-6xl mb-4"></i>
            <h2 class="text-xl font-bold text-gray-400 uppercase tracking-widest">Konten Belum Tersedia</h2>
            <p class="text-gray-400 mt-2">Silakan isi data QHSE melalui panel admin.</p>
        </div>
    @endif

    @include('layouts.partials.footer')
    
</body>
</html>