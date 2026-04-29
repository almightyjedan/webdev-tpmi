<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gallery - Torishima</title>
</head>
<body class="bg-gray-50">
    @include('layouts.partials.navbar')

    <div class="max-w-7xl mx-auto px-4 py-10 font-sans">
    
        <div class="mb-16">
            <h2 id="video-list" class="scroll-mt-24 text-2xl font-bold text-gray-900 mb-8 border-l-4 border-blue-900 pl-4 uppercase tracking-wider">Videos</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($videos as $video)
                <div class="group cursor-pointer">
                    <a href="{{ route('gallery.show', $video->id) }}" class="relative block aspect-video overflow-hidden bg-black shadow-lg">
                        @if($video->thumbnail)
                            <img src="{{ asset('storage/'.$video->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <video src="{{ asset('storage/'.$video->file_path) }}#t=0.5" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" muted playsinline></video>
                        @endif
                        
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/50 transition-all duration-500"></div>

                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-black/60 rounded-full flex items-center justify-center border-2 border-white/80 group-hover:scale-110 transition-all duration-500">
                                <div class="w-0 h-0 border-t-[10px] border-t-transparent border-l-[18px] border-l-white border-b-[10px] border-b-transparent ml-1"></div>
                            </div>
                        </div>
                    </a>
                    
                    <div class="mt-4">
                        <h3 class="text-blue-900 font-extrabold text-sm md:text-base leading-tight uppercase transition-colors group-hover:text-blue-700">
                            {{ $video->title }}
                        </h3>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $videos->fragment('video-list')->appends(['ipage' => $images->currentPage()])->links() }}
            </div>
        </div>

        <div>
            <h2 id="photo-list" class="scroll-mt-52 text-2xl font-bold text-gray-900 mb-8 border-l-4 border-green-700 pl-4 uppercase tracking-wider">Photos</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-5 gap-1">
                @foreach($images as $image)
                {{-- GANTI aspect-square MENJADI aspect-video --}}
                <a href="{{ route('gallery.show', $image->id) }}" class="relative aspect-video overflow-hidden bg-gray-100 group shadow-sm border border-gray-200">
                    
                    <img src="{{ asset('storage/'.$image->file_path) }}" 
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                    {{-- Overlay Judul Tetap Sama --}}
                    <div class="absolute inset-0 bg-blue-900/30 flex flex-col items-center justify-center p-3 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0">
                        <span class="text-white text-center text-[10px] md:text-xs font-bold uppercase tracking-tighter leading-tight">
                            {{ $image->title }}
                        </span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $images->fragment('photo-list')->appends(['vpage' => $videos->currentPage()])->links() }}
            </div>
        </div>

    </div>

    @include('layouts.partials.footer')

    <script>
        document.querySelectorAll('video').forEach(vid => {
            vid.addEventListener('click', e => e.preventDefault());
        });
    </script>
</body>
</html>