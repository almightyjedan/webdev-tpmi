<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Torishima Pump Mfg. Indonesia</title>
		<script src="https://cdn.tailwindcss.com"></script>
		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
		<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	</head>
	<body>
		@include('layouts.partials.navbar')
		<section class="relative h-[450px] overflow-hidden">
			<video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
				<source src="{{ asset('images/homepage/ANIMASI-TORISHIMA-525px.mp4') }}" type="video/mp4">
				Your browser does not support the video tag.
			</video>
			<div class="absolute inset-0 bg-black/30 flex items-center justify-center">
				<!-- <h1 class="text-white text-5xl font-light italic tracking-widest">TORISHIMA</h1> -->
			</div>
		</section>
		<div class="px-6 py-6">
			<p class="text-right text-purple-900 italic font-semibold text-xl">
				Welcome to Torishima Pump Mfg. Indonesia, let's get you started!
			</p>
		</div>
<section class="w-full py-10 overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        
        <div class="relative bg-blue-100 h-64 md:h-80 lg:h-[400px] flex items-center justify-center border border-gray-200 w-full">
            <img src="{{ asset('images/.jpeg') }}" alt="photo 1" class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute -bottom-20 right-0 lg:-right-20 w-[250px] md:w-[350px] lg:w-[450px] z-10" 
                style="-webkit-mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent); 
                mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);">
                <img src="{{ asset('images/homepage/water-splash.webp') }}" alt="No Fluid No Life" class="w-full h-auto block">
                <p class="absolute inset-0 flex items-center justify-center text-white font-black italic text-lg md:text-2xl uppercase tracking-tighter drop-shadow-lg">
                    No Fluid, No Life
                </p>
            </div>
        </div>

        <div class="px-6 md:px-12 lg:px-20 xl:px-36">
            <p class="text-base md:text-lg lg:text-xl leading-relaxed text-justify text-gray-800">
                Torishima Pump Mfg. Indonesia is a company manufacturing pumps and pumping system, including standard and custom. Our solutions are engineered in response to the challenge of the industry. By using state-of-the-art manufacturing facilities, PT. Torishima Pump Mfg. Indonesia is capable of producing world-class industrial pump product ranges including End Suction, Multi-Stage High Pressure, Double Suction and Vertical Mixed Flow Pumps.
            </p>
        </div>
        
    </div>
</section>

<section class="w-full py-10 pt-20 md:pt-40 lg:py-16 lg:pt-60 overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-0 items-center">
        
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 order-2 lg:order-1">
            <div class="text-left">
                <h3 class="text-purple-900 font-bold text-xl md:text-2xl mb-2 italic">VISION</h3>
                <p class="text-lg md:text-xl text-gray-700 leading-tight">
                    To be recognized as a world-class pump manufacturer company committed to excellence.
                </p>
            </div>
            <div class="text-right pr-0 md:pr-10 mt-10">
                <h3 class="text-purple-900 font-bold text-xl md:text-2xl mb-2 italic">MISSION</h3>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                    We Develop, manufacture and provide high quality industrial pumps to satisfy customer requirement in infrastructure and industry for domestic and international market.
                </p>
            </div>
        </div>

        <div class="relative w-full h-64 md:h-80 lg:h-[450px] bg-[#D3E3D3] flex items-center justify-center border-l-0 lg:border-l border-gray-200 order-1 lg:order-2">
            
            <div class="absolute -top-20 right-0 md:-top-40 md:right-20 lg:-top-60 lg:right-20 w-[250px] md:w-[350px] lg:w-[450px] z-[-1] pointer-events-none lg:translate-x-12">
                <img src="{{ asset('images/homepage/purple-art.webp') }}" alt="Art Decor" class="w-full h-auto">
            </div>

            <div class="relative z-10 flex items-center justify-center w-full h-full">
                <img src="{{ asset('images/.jpeg') }}"
                alt="photo 2"
                class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>

    </div>
</section>
		
<section class="w-full px-6 md:px-12 lg:px-20 xl:px-36 py-10 lg:py-16">
    <div class="text-right">
        <h4 class="text-purple-900 font-bold italic text-xl md:text-2xl mb-8">Our Solutions</h4>
    </div>

    <div class="flex flex-col lg:flex-row gap-10 items-start">
        
        <div class="w-full lg:w-3/4 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @php
            $solutions = [
                'Water Works & Environment', 'Construction & Utility', 'Oil and Gas', 'General Industry',
                'Marine', 'Energy Industry', 'Chemical Industry'
            ];
            @endphp
            @foreach($solutions as $item)
            <div class="bg-[#D3E3D3] p-4 md:p-5 min-h-[160px] md:min-h-[200px] flex flex-col justify-between shadow-sm transition hover:scale-105 border border-gray-100">
                <span class="text-sm md:text-base lg:text-[15px] xl:text-lg font-bold text-blue-900 leading-tight uppercase">
                    {{ $item }}
                </span>
                <a href="#" class="text-xs md:text-sm text-right font-black text-blue-900 uppercase tracking-tighter mt-4">
                    Explore &rarr;
                </a>
            </div>
            @endforeach
        </div>

        <div class="w-full lg:w-1/4 flex justify-center lg:justify-end">
            <div class="w-40 h-40 md:w-56 md:h-56 lg:w-full">
                <img src="{{ asset('images/homepage/solutions-chart.png') }}" alt="Solutions Distribution" class="w-full h-auto object-contain">
            </div>
        </div>

    </div>
</section>

<section class="w-full py-10 lg:py-16 overflow-hidden">
    <div class="px-6 md:px-12 lg:px-20 xl:px-36 mb-8">
        <h2 class="text-purple-900 font-bold italic text-2xl md:text-3xl uppercase tracking-tighter">
            Latest Project
        </h2>
    </div>

    <div class="w-full bg-[#D9E3EB] py-10 lg:py-12">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36">
            <div class="flex flex-col lg:flex-row gap-6 items-stretch">
                
                <div class="flex-1 overflow-hidden"> 
                    <div class="swiper projectSwiper">
                        <div class="swiper-wrapper">
                            @foreach($projects as $project)
                            <div class="swiper-slide">
                                <div class="relative group h-60 md:h-72 lg:h-60 overflow-hidden border-4 border-purple-900 bg-white">
                                    @if($project->images && count($project->images) > 0)
                                        <img src="{{ url('storage/' . $project->images[0]) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">No Image</div>
                                    @endif

                                    <div class="hidden group-hover:flex absolute inset-0 bg-black/70 p-4 flex-col justify-center items-start text-white transition-opacity">
                                        <h3 class="font-bold text-lg uppercase mb-1 leading-tight">{{ $project->title }}</h3>
                                        <p class="text-xs mb-4 line-clamp-3">{{ $project->description }}</p>
                                        <button class="bg-white text-black text-[10px] px-3 py-1 font-bold uppercase">Read More</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex mt-6 space-x-2">
                        <button class="btn-prev w-8 h-8 rounded-full border border-gray-400 flex items-center justify-center hover:bg-white transition-colors">
                            <i class="fas fa-chevron-left text-xs text-gray-600"></i>
                        </button>
                        <button class="btn-next w-8 h-8 rounded-full border border-gray-400 flex items-center justify-center hover:bg-white transition-colors">
                            <i class="fas fa-chevron-right text-xs text-gray-600"></i>
                        </button>
                    </div>
                </div>

                <div class="w-full lg:w-20 h-16 lg:h-60 flex-shrink-0">
                    <a href="/projects" class="group relative w-full h-full border-4 border-purple-900 bg-white hover:bg-purple-900 transition-all duration-300 flex items-center justify-center">
                        <span class="font-bold text-purple-900 group-hover:text-white text-center uppercase tracking-widest text-xs lg:text-[10px] lg:[writing-mode:vertical-lr]">
                            VIEW MORE
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="w-full flex justify-end py-10 lg:py-16 overflow-visible">
    <section class="relative w-[95%] lg:w-2/3 bg-[#1B5268] text-white min-h-[300px] flex items-center overflow-visible rounded-l-[2rem] shadow-2xl">
        
        <div class="absolute inset-y-0 left-0 px-4 w-full md:w-1/2 z-0 pointer-events-none flex items-center opacity-10 md:opacity-30 lg:opacity-100">
            <img src="{{ asset('images/homepage/map_indonesia.webp') }}" 
                class="h-1/2 md:h-2/3 lg:h-full w-auto object-contain brightness-0 invert">
        </div>

        <div class="relative z-20 w-full px-6 md:px-10 lg:px-20 py-10">
            <div class="ml-auto w-full md:w-[70%] lg:w-1/2 text-right">
                <h2 class="text-xl md:text-2xl lg:text-4xl font-serif italic mb-4 leading-tight uppercase tracking-tight">
                    After-Sales Service
                </h2>
                <p class="text-sm md:text-base lg:text-xl pl-0 lg:pl-12 text-gray-100 leading-relaxed mb-6 md:mb-8 text-justify md:text-right">
                    Our commitment goes beyond the sale. We provide ongoing support, guidance, and solutions to make sure you get the best performance and satisfaction from our product.
                </p>
                <div class="flex justify-end">
                    <a href="#" class="inline-block bg-white text-[#1B5268] px-6 md:px-10 py-2 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold shadow-xl hover:scale-105 transition-all uppercase tracking-widest">
                        LEARN MORE
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="w-full flex justify-start py-10 overflow-hidden">
    <div class="group w-[95%] lg:w-2/3 relative rounded-r-[2rem] overflow-hidden min-h-[450px] md:min-h-[400px] border border-gray-300 shadow-2xl bg-white flex flex-col md:flex-row">
        
        <div class="relative w-full md:w-[40%] lg:w-1/3 bg-[#D1DFD6] z-40 p-6 md:p-8 lg:p-10 flex flex-col justify-center">
            <h3 class="text-[#5D5A88] text-xl md:text-2xl lg:text-3xl font-extrabold leading-tight mb-3 md:mb-4 uppercase tracking-tighter">
                Unlock powerful performance
            </h3>
            <p class="text-[#5D5A88]/80 text-[10px] md:text-xs lg:text-sm font-medium leading-relaxed mb-4 md:mb-6">
                that exceeds your expectations and preserves the planet
            </p>
        </div>

        <div class="relative flex-1 h-[250px] md:h-full overflow-hidden">
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ asset('images/homepage/Centrifugal pump.mp4') }}" type="video/mp4">
            </video>

            <div class="absolute inset-0 bg-black/40 md:bg-black/50 opacity-100 lg:opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20"></div>
            <div class="absolute inset-0 z-50 flex items-center justify-center opacity-100 lg:opacity-0 group-hover:opacity-100 transition-all duration-500">
                <button class="bg-[#FF0000] text-white px-4 md:px-6 py-2 md:py-3 rounded-lg flex items-center space-x-2 shadow-2xl transform scale-90 group-hover:scale-100 transition-transform duration-300">
                    <div class="w-0 h-0 border-t-[5px] border-t-transparent border-l-[8px] border-l-white border-b-[5px] border-b-transparent"></div>
                    <span class="font-bold text-[10px] md:text-xs uppercase tracking-widest">Watch More</span>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="px-6 md:px-12 lg:px-20 xl:px-36 py-16 bg-white overflow-hidden">
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-[#5D5A88] text-2xl md:text-4xl font-extrabold italic tracking-tighter uppercase">
            Recent News
        </h2>
        <div class="hidden lg:flex space-x-2">
            <button class="news-prev w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-[#5D5A88] hover:text-white transition-all">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button class="news-next w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-[#5D5A88] hover:text-white transition-all">
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

    <div class="swiper newsSwiper">
        <div class="swiper-wrapper">
            @foreach($news as $n)
            <div class="swiper-slide h-auto">
                <div class="bg-[#B8CDDC] p-5 h-full flex flex-col shadow-sm transition-transform hover:-translate-y-1 duration-300 mx-1">
                    <div class="aspect-video bg-[#7091B1] border border-gray-400/30 flex items-center justify-center mb-4 relative overflow-hidden shadow-inner">
                        @if($n->image)
                            <img src="{{ asset('storage/' . $n->image) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-white/40 font-bold text-[10px] tracking-widest uppercase">[PHOTO]</span>
                        @endif
                    </div>
                    <h4 class="text-[#1B5268] text-[14px] font-extrabold leading-tight uppercase mb-2 line-clamp-2">{{ $n->title }}</h4>
                    <div class="mt-auto">
                        <a href="#" class="inline-block bg-[#5D5A88] text-white px-4 py-2 rounded-full text-[9px] font-bold uppercase tracking-widest shadow-md">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex lg:hidden justify-center pt-8 space-x-4">
        <button class="news-prev w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center active:bg-[#5D5A88] active:text-white transition-all">
            <i class="fas fa-chevron-left text-base"></i>
        </button>
        <button class="news-next w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center active:bg-[#5D5A88] active:text-white transition-all">
            <i class="fas fa-chevron-right text-base"></i>
        </button>
    </div>
</section>
		@include('layouts.partials.footer')

		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const swiper = new Swiper('.projectSwiper', {
					slidesPerView: 1, // Default HP 1 kolom
					spaceBetween: 24, // Jarak antar slide (gap-6 di Tailwind itu 24px)
					loop: false,
					breakpoints: {
						640: { slidesPerView: 2 },
						1024: { slidesPerView: 4 }, // Grid tetap 4 di Desktop
					},
					navigation: {
						nextEl: '.btn-next',
						prevEl: '.btn-prev',
					},
				});
			});

			const newsSwiper = new Swiper('.newsSwiper', {
				slidesPerView: 1,
				spaceBetween: 20, // Diperkecil agar pas di mobile
				loop: true,
				grabCursor: true,
				
				// Matikan FreeMode jika navigasi tombol tidak jalan presisi
				// Atau pastikan sticky aktif
				freeMode: {
					enabled: true,
					sticky: true,
				},

				autoplay: {
					delay: 3500,
					disableOnInteraction: false,
				},

				// Tambahkan ini agar Swiper mendeteksi semua tombol dengan class tersebut
				navigation: {
					nextEl: '.news-next',
					prevEl: '.news-prev',
				},

				// CRITICAL: Tambahkan observer agar Swiper memantau tombol yang tadinya hidden
				observer: true,
				observeParents: true,

				breakpoints: {
					// Mobile (425px ke atas)
					425: {
						slidesPerView: 1.2, // Biar kelihatan ada slide selanjutnya sedikit
						spaceBetween: 20,
					},
					// Tablet (768px)
					768: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
					// Laptop (1024px)
					1024: {
						slidesPerView: 4,
						spaceBetween: 30,
						freeMode: false, // Di laptop matikan freeMode agar navigasi tombol lebih mantap
					},
				},
			});
		</script>
	</body>
</html>