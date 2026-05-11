<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Recent Projects - Torishima</title>
    <style>
        .project-card .details {
            opacity: 0;
            transform: translateY(100%);
            transition: all 0.4s ease-in-out;
        }
        .project-card:hover .details {
            opacity: 1;
            transform: translateY(0);
        }
        .project-card { isolation: isolate; }
    </style>
</head>
<body class="bg-[#1a1a1a]">
    @include('layouts.partials.navbar')

    <section class="max-w-7xl mx-auto px-4 py-16 text-white">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-white-800 pb-6">
            <div>
                <h2 class="text-3xl font-bold tracking-tight relative inline-block">
                    Recent projects
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                </h2>
            </div>
            
            <div class="flex space-x-6 mt-6 md:mt-0 text-sm font-bold uppercase tracking-widest text-gray-400">
                <button onclick="filterProjects('all')" class="filter-btn hover:text-[#4A80D4] transition border-b-2 border-[#4A80D4] text-white pb-1">All projects</button>
                <button onclick="filterProjects('Indonesia')" class="filter-btn hover:text-[#4A80D4] transition border-b-2 border-transparent pb-1">Indonesia</button>
                <button onclick="filterProjects('Overseas')" class="filter-btn hover:text-[#4A80D4] transition border-b-2 border-transparent pb-1">Overseas</button>
            </div>
        </div>

        <div class="relative group">
            <div class="swiper projectSwiper">
                <div class="swiper-wrapper" id="project-wrapper">
                    @foreach($projects as $p)
                    <div class="swiper-slide project-card relative aspect-square overflow-hidden bg-gray-900 group" data-category="{{ $p->category }}">
                        @php $images = is_array($p->images) ? $p->images : json_decode($p->images, true); @endphp
                        @if(!empty($images))
                            <img src="{{ asset('storage/' . $images[0]) }}" class="w-full h-full object-cover">
                        @endif

                        <div class="details absolute inset-0 bg-black/80 p-8 flex flex-col justify-center text-center">
                            <h3 class="text-xl font-bold uppercase mb-3">{{ $p->main_title }}</h3>
                            <p class="text-sm text-gray-300 line-clamp-4 mb-6">{{ strip_tags($p->description) }}</p>
                            <a href="{{ route('recent-project.show', $p->id) }}" class="inline-block border border-white mx-auto px-6 py-2 text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-black transition">
                                Read More
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center space-x-4 mt-10">
                <button class="prev-btn w-12 h-12 border border-gray-700 flex items-center justify-center hover:bg-[#4A80D4] transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="next-btn w-12 h-12 border border-gray-700 flex items-center justify-center hover:bg-[#4A80D4] transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </section>

    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const allSlides = Array.from(document.querySelectorAll('.project-card'));

        var swiper = new Swiper(".projectSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: allSlides.length > 3,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".next-btn",
                prevEl: ".prev-btn",
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });

        function filterProjects(category) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-[#4A80D4]', 'text-white');
                btn.classList.add('border-transparent');
                
                const btnText = btn.innerText.toLowerCase().trim();
                if(btnText === category.toLowerCase() || (category === 'all' && btnText === 'all projects')) {
                    btn.classList.add('border-[#4A80D4]', 'text-white');
                    btn.classList.remove('border-transparent');
                }
            });

            const filteredSlides = allSlides.filter(slide => {
                const projectCat = (slide.getAttribute('data-category') || '').toLowerCase().trim();
                return category.toLowerCase() === 'all' || projectCat === category.toLowerCase();
            });

            swiper.destroy(true, true);
            
            const wrapper = document.getElementById('project-wrapper');
            wrapper.innerHTML = '';
            
            filteredSlides.forEach(slide => {
                wrapper.appendChild(slide.cloneNode(true));
            });

            swiper = new Swiper(".projectSwiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: filteredSlides.length > 3, 
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                navigation: {
                    nextEl: ".next-btn",
                    prevEl: ".prev-btn",
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
        }
    </script>
</body>
</html>