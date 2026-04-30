<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ mobileMenuOpen: false }" class="fixed top-0 w-full z-[100]">
    
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-full mx-auto px-6 md:px-8 h-[70px] md:h-[95px] flex items-center">
            <div class="flex-none">
                <a href="/">
                    <img src="{{ asset('images/homepage/topbar_logo_pt_torishima_services_indonesia_2x.webp') }}" 
                        alt="Torishima Logo" 
                        class="h-10 md:h-[65px] w-auto transition-all"> 
                </a>
            </div>
            <div class="flex-grow"></div>
            <div class="flex items-center space-x-4 md:space-x-8">
                <div class="hidden md:flex items-center text-purple-900 font-bold text-xl border-r border-gray-200 pr-8">
                    <a href="#" class="hover:text-blue-600 transition">INA</a>
                    <span class="mx-2 text-gray-300">-</span>
                    <a href="#" class="hover:text-blue-600 transition">ENG</a>
                </div>
                <button class="text-white bg-purple-900 p-1.5 md:p-2 hover:bg-purple-800 rounded-full transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <button @click="mobileMenuOpen = true" class="text-purple-900 transition">
                    <svg class="h-9 w-9 md:h-11 md:w-11" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <nav class="bg-gradient-to-r from-[#cccccc] to-[#ffffff] backdrop-blur-md hidden lg:block shadow-lg">
        <div class="w-full flex items-center">
            <div class="group relative flex-1">
                <button class="w-full px-4 py-6 text-purple-800 group-hover:bg-sky-800/60 group-hover:text-white font-bold uppercase text-base tracking-widest transition duration-300">About Us</button>
                <div class="font-bold absolute left-0 top-full w-full min-w-[250px] bg-sky-800/60 backdrop-blur-md hidden group-hover:block text-white shadow-xl">
                    <div class="group/sub relative border-b border-white/10">
                        <a class="block px-8 py-4 hover:bg-white/20 text-[14px] flex justify-between items-center transition">OUR STORY <span>></span></a>
                        <div class="absolute left-full top-0 min-w-[250px] bg-sky-800/60 backdrop-blur-md hidden group-hover/sub:block text-white shadow-2xl border-l border-white/20">
                            <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">CORPORATE OUTLINE</a>
                            <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">CORPORATE PROFILE</a>
                            <a href="#" class="block px-8 py-4 hover:bg-white/20 text-[14px]">CORPORATE DATA</a>
                        </div>
                    </div>
                    <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">CERTIFICATE</a>
                    <a href="#" class="block px-8 py-4 hover:bg-white/20 text-[14px]">COMPANY AFFILIATE</a>
                </div>
            </div>

            <div class="group relative flex-1">
                <button class="w-full px-4 py-6 text-purple-800 group-hover:bg-sky-800/60 group-hover:text-white font-bold uppercase text-base tracking-widest transition duration-300">What We Offer</button>
                <div class="font-bold absolute left-0 top-full w-full min-w-[280px] bg-sky-800/60 backdrop-blur-md hidden group-hover:block text-white shadow-xl">
                    <div class="group/sub relative border-b border-white/10">
                        <a class="block px-8 py-4 hover:bg-white/20 text-[14px] flex justify-between items-center transition">PRODUCTS <span>></span></a>
                        <div class="absolute left-full top-0 min-w-[250px] bg-sky-800/60 backdrop-blur-md hidden group-hover/sub:block text-white shadow-2xl border-l border-white/20">
                            <a href="{{ route('products.index') }}" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">CATEGORIES</a>
                            <a href="#" class="block px-8 py-4 hover:bg-white/20 text-[14px]">APPLICATIONS AND INDUSTRIES</a>
                        </div>
                    </div>
                    <div class="group/sub relative">
                        <a class="block px-8 py-4 hover:bg-white/20 text-[14px] flex justify-between items-center transition">SERVICE AND SUPPORT <span>></span></a>
                        <div class="absolute left-full top-0 min-w-[250px] bg-sky-800/60 backdrop-blur-md hidden group-hover/sub:block text-white shadow-2xl border-l border-white/20">
                            <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">AFTER SALES</a>
                            <a href="#" class="block px-8 py-4 hover:bg-white/20 text-[14px]">PUMP TESTING FACILITY</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group relative flex-1">
                <button class="w-full px-4 py-6 text-purple-800 group-hover:bg-sky-800/60 group-hover:text-white font-bold uppercase text-base tracking-widest transition duration-300">Pump Selector</button>
                <div class="font-bold absolute left-0 top-full w-full min-w-[250px] bg-sky-800/60 backdrop-blur-md hidden group-hover:block text-white shadow-xl">
                    <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">ECO PUMP SELECTOR</a>
                    <!-- <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">CEN</a>
                    <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">VS-4</a> -->
                    <a href="{{ route('pumpselector.index') }}" class="block px-8 py-4 hover:bg-white/20 text-[14px]">PUMP SELECTOR</a>
                </div>
            </div>

            <div class="flex-1 text-center">
                <a href="#" class="block w-full px-4 py-6 text-purple-800 hover:bg-sky-800/60 hover:text-white font-bold uppercase text-base tracking-widest transition duration-300">QHSE</a>
            </div>

            <div class="group relative flex-1">
                <button class="w-full px-4 py-6 text-purple-800 group-hover:bg-sky-800/60 group-hover:text-white font-bold uppercase text-base tracking-widest transition duration-300">Media</button>
                <div class="font-bold absolute right-0 top-full w-full min-w-[250px] bg-sky-800/60 backdrop-blur-md hidden group-hover:block text-white shadow-xl">
                    <a href="#" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">PRESS RELEASE</a>
                    <a href="{{ route('gallery.index') }}" class="block px-8 py-4 hover:bg-white/20 border-b border-white/10 text-[14px]">GALLERY</a>
                    <a href="#" class="block px-8 py-4 hover:bg-white/20 text-[14px]">RECENT PROJECT</a>
                </div>
            </div>
        </div>
    </nav>

    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="lg:hidden fixed inset-0 z-[110] bg-white overflow-y-auto">
        
        <div class="sticky top-0 bg-white/95 backdrop-blur-md px-6 md:px-8 h-[70px] md:h-[95px] flex items-center justify-between border-b border-gray-100">
            <img src="{{ asset('images/homepage/topbar_logo_pt_torishima_services_indonesia_2x.webp') }}" class="h-9 md:h-[55px] w-auto">
            <button @click="mobileMenuOpen = false" class="p-2 text-purple-900 bg-purple-50 rounded-full hover:bg-purple-100 transition">
                <svg class="h-7 w-7 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-6 md:px-8 py-10 pb-24">
            <div x-data="{ activeMenu: null }" class="space-y-6">
                
                <div class="space-y-4">
                    <button @click="activeMenu === 1 ? activeMenu = null : activeMenu = 1" class="flex items-center justify-between w-full">
                        <span class="text-xl md:text-2xl font-bold tracking-tighter" :class="activeMenu === 1 ? 'text-sky-600' : 'text-purple-900'">ABOUT US</span>
                        <span class="text-sky-600 font-light text-2xl md:text-3xl" x-text="activeMenu === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeMenu === 1" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="grid gap-4 pl-2 py-2 border-l-2 border-sky-600 mt-2 text-sm md:text-lg">
                            <a class="font-bold text-gray-800">OUR STORY</a>
                            <div class="flex flex-col gap-2 pl-4 text-gray-500 italic">
                                <a href="#">• Corporate Outline</a>
                                <a href="#">• Corporate Profile</a>
                                <a href="#">• Corporate Data</a>
                            </div>
                            <a href="#" class="font-bold text-gray-800 uppercase">Certificate</a>
                            <a href="#" class="font-bold text-gray-800 uppercase">Company Affiliate</a>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 pt-4 border-t border-gray-50">
                    <button @click="activeMenu === 2 ? activeMenu = null : activeMenu = 2" class="flex items-center justify-between w-full">
                        <span class="text-xl md:text-2xl font-bold tracking-tighter" :class="activeMenu === 2 ? 'text-sky-600' : 'text-purple-900'">WHAT WE OFFER</span>
                        <span class="text-sky-600 font-light text-2xl md:text-3xl" x-text="activeMenu === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeMenu === 2" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="grid gap-4 pl-2 py-2 border-l-2 border-sky-600 mt-2 text-sm md:text-lg">
                            <a class="font-bold text-gray-800 uppercase">Products</a>
                            <div class="flex flex-col gap-2 pl-4 text-gray-500 italic">
                                <a href="{{ route('products.index') }}">• Categories</a>
                                <a href="#">• Applications & Industries</a>
                            </div>
                            <a class="font-bold text-gray-800 uppercase">Services</a>
                            <div class="flex flex-col gap-2 pl-4 text-gray-500 italic">
                                <a href="#">• After Sales</a>
                                <a href="#">• Pump Testing Facility</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 pt-4 border-t border-gray-50">
                    <button @click="activeMenu === 3 ? activeMenu = null : activeMenu = 3" class="flex items-center justify-between w-full">
                        <span class="text-xl md:text-2xl font-bold tracking-tighter" :class="activeMenu === 3 ? 'text-sky-600' : 'text-purple-900'">PUMP SELECTOR</span>
                        <span class="text-sky-600 font-light text-2xl md:text-3xl" x-text="activeMenu === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeMenu === 3" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="grid gap-4 pl-2 py-2 border-l-2 border-sky-600 mt-2 text-sm md:text-lg">
                            <a href="#" class="font-bold text-gray-800 uppercase">Eco Pump Selector</a>
                            <!-- <a href="#" class="font-bold text-gray-800 uppercase">CEN</a>
                            <a href="#" class="font-bold text-gray-800 uppercase">VS-4</a> -->
                            <a href="{{ route('pumpselector.index') }}" class="font-bold text-gray-800 uppercase">PUMP SELECTOR</a>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-50">
                    <a href="#" class="text-xl md:text-2xl font-bold text-purple-900 tracking-tighter block py-2">QHSE</a>
                </div>

                <div class="space-y-4 pt-4 border-t border-gray-50">
                    <button @click="activeMenu === 4 ? activeMenu = null : activeMenu = 4" class="flex items-center justify-between w-full">
                        <span class="text-xl md:text-2xl font-bold tracking-tighter" :class="activeMenu === 4 ? 'text-sky-600' : 'text-purple-900'">MEDIA</span>
                        <span class="text-sky-600 font-light text-2xl md:text-3xl" x-text="activeMenu === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeMenu === 4" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="grid gap-4 pl-2 py-2 border-l-2 border-sky-600 mt-2 text-sm md:text-lg">
                            <a href="#" class="font-bold text-gray-800 uppercase">Press Release</a>
                            <a href="{{ route('gallery.index') }}" class="font-bold text-gray-800 uppercase">Gallery</a>
                            <a href="#" class="font-bold text-gray-800 uppercase">Recent Project</a>
                        </div>
                    </div>
                </div>

                <div class="pt-10">
                    <div class="inline-flex p-1 bg-gray-100 rounded-full">
                        <a href="#" class="px-5 py-2 rounded-full bg-purple-900 text-white font-bold text-xs">INA</a>
                        <a href="#" class="px-5 py-2 rounded-full text-gray-500 font-bold text-xs">ENG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="h-[70px] md:h-[95px] xl:h-[180px]"></div>