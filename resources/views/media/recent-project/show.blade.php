<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <title>{{ $project->main_title }} - Torishima</title>
</head>
<body class="bg-white">
    @include('layouts.partials.navbar')

    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col lg:flex-row gap-12 items-start">
            
            <div class="lg:w-1/3">
                <div class="mb-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 uppercase leading-tight tracking-tight relative pb-4">
                        {{ $project->main_title }}
                        <span class="absolute bottom-0 left-0 w-10 h-[3px] bg-[#4A80D4]"></span>
                    </h1>
                </div>

                <div class="mb-8">
                    <h3 class="text-sm font-extrabold text-gray-400 uppercase tracking-[0.2em]">
                        {{ $project->title }}
                    </h3>
                </div>

                <div class="prose prose-sm text-gray-500 leading-relaxed text-justify">
                    {!! $project->description !!}
                </div>

                @if($project->detailPumps->count() > 0)
                <div class="mt-10 pt-6 border-t border-gray-100 text-2xl">
                    <h4 class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Pumps Used:</h4>
                    <ul class="text-xs text-gray-600 space-y-1 font-medium">
                        @foreach($project->detailPumps as $pump)
                            <li>&bull; {{ $pump->model_name }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="lg:w-2/3 w-full">
                @php 
                    $images = is_array($project->images) ? $project->images : json_decode($project->images, true);
                @endphp
                
                @if(!empty($images))
                    <div class="border border-gray-200 p-2 bg-white shadow-sm">
                        <a id="main-link" href="{{ asset('storage/' . $images[0]) }}" data-fancybox="project-gallery">
                            <div class="overflow-hidden bg-gray-100 aspect-square cursor-zoom-in">
                                <img id="main-display" src="{{ asset('storage/' . $images[0]) }}" 
                                    class="w-full h-full object-cover transition-opacity duration-300">
                            </div>
                        </a>
                        
                        <div class="py-3 border-b border-gray-100 flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                                {{ $project->main_title }}
                            </span>
                            <button class="text-gray-300 hover:text-gray-500" onclick="document.getElementById('main-link').click()">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </button>
                        </div>

                        @if(count($images) > 1)
                        <div class="flex gap-3 mt-4 overflow-x-auto pb-2">
                            @foreach($images as $img)
                            {{-- Kita simpan sisa gambar di elemen hidden agar Fancybox bisa swipe semua gambar --}}
                            <a href="{{ asset('storage/' . $img) }}" data-fancybox="project-gallery" class="hidden"></a>
                            
                            <div class="w-20 h-20 flex-shrink-0 cursor-pointer border-2 border-transparent hover:border-blue-500 transition-all overflow-hidden"
                                onclick="changeImage('{{ asset('storage/' . $img) }}', this)">
                                <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                @endif
            </div>

            <script>
                function changeImage(src, element) {
                    const mainImg = document.getElementById('main-display');
                    const mainLink = document.getElementById('main-link');
                    
                    mainImg.style.opacity = '0';
                    setTimeout(() => {
                        mainImg.src = src;
                        mainLink.href = src;
                        mainImg.style.opacity = '1';
                    }, 200);

                    // Update UI Border
                    document.querySelectorAll('.flex-shrink-0').forEach(thumb => {
                        thumb.classList.remove('border-blue-500');
                        thumb.classList.add('border-transparent');
                    });
                    element.classList.add('border-blue-500');
                }

                Fancybox.bind("[data-fancybox='project-gallery']", {
                    Thumbs: { autoStart: true },
                    Toolbar: {
                        display: {
                            right: ["iterateZoom", "fullscreen", "close"],
                        },
                    },
                });
            </script>

        </div>

        <div class="mt-12 pt-8 border-t border-gray-100">
            <a href="{{ url('/recent-project') }}" class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-blue-900 uppercase tracking-widest transition">
                &larr; Back to Recent Project
            </a>
        </div>
    </section>

    @include('layouts.partials.footer')
</body>
</html>