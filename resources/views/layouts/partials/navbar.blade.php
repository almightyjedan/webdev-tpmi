<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white shadow-md">
    
    <div class="bg-[#006BB3] h-[45px] w-full hidden xl:block">
        <div class="max-w-7xl mx-auto h-full flex justify-end items-center px-4 sm:px-6 lg:px-8 space-x-5">
            <div class="flex items-center space-x-5">
                <button class="text-white hover:text-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[22px] w-[22px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <a href="#" class="text-white hover:opacity-80 transition">
                    <svg class="h-[24px] w-[24px] fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="#" class="text-white hover:opacity-80 transition">
                    <svg class="h-[24px] w-[24px] fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.98 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.058-1.69-.072-4.949-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.209-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="#" class="text-white hover:opacity-80 transition">
                    <svg class="h-[24px] w-[24px] fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <nav class="bg-white border-b border-gray-100 w-full h-[85px]">
        <div class="max-w-7xl mx-auto h-full flex justify-between items-center px-4 sm:px-6 lg:px-8">
            
            <button @click="mobileMenuOpen = true" class="xl:hidden text-[#006BB3] p-2 focus:outline-none">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="flex items-center">
                <a href="/">
                    <img src="{{ asset('images/homepage/topbar_logo_pt_torishima_services_indonesia_2x.webp') }}" 
                         alt="Torishima Logo" 
                         class="h-[45px] w-auto"> 
                </a>
            </div>

            <div class="hidden xl:flex items-center space-x-9 h-[85px]">
                <a href="/" class="text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition">Home</a>

                <div class="group relative h-full flex items-center">
                    <button class="flex items-center text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition">
                        Corporate Info <svg class="ml-1 w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-1/2 -translate-x-1/2 top-[85px] hidden group-hover:block w-64 bg-white border border-gray-100 shadow-2xl z-50 transition-all duration-200">
                        <div class="py-2">
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">History</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Corporate Data</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Corporate Profile</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Vision Mission & Value</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Certificates</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">CSR</a>
                        </div>
                    </div>
                </div>

                <div class="group relative h-full flex items-center">
                    <button class="flex items-center text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition text-center leading-tight">
                        Products & <br> Services <svg class="ml-1 w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-1/2 -translate-x-1/2 top-[85px] hidden group-hover:block w-60 bg-white border border-gray-100 shadow-2xl z-50">
                        <div class="py-2">
                            <a href="{{ route('products.index') }}" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Products</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Pump Test Facility</a>
                        </div>
                    </div>
                </div>

                <div class="group relative h-full flex items-center">
                    <button class="flex items-center text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition">
                        Pump Selector <svg class="ml-1 w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-1/2 -translate-x-1/2 top-[85px] hidden group-hover:block w-56 bg-white border border-gray-100 shadow-2xl z-50">
                        <div class="py-2">
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Pump Selector 1</a>
                            <a href="{{ route('pumpselector.index') }}" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Pump Selector 2</a>
                        </div>
                    </div>
                </div>

                <a href="#" class="text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition">QHSE</a>

                <div class="group relative h-full flex items-center">
                    <button class="flex items-center text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition">
                        Media <svg class="ml-1 w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-1/2 -translate-x-1/2 top-[85px] hidden group-hover:block w-56 bg-white border border-gray-100 shadow-2xl z-50">
                        <div class="py-2">
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Press Release</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Gallery</a>
                            <a href="#" class="block px-6 py-3 text-[13px] text-[#006BB3] hover:bg-blue-50 font-bold uppercase tracking-tight transition">Recent Project</a>
                        </div>
                    </div>
                </div>

                <a href="#" class="text-[15px] font-medium text-[#006BB3] hover:text-blue-800 transition">Contact Us</a>
            </div>

            <button class="xl:hidden text-[#006BB3] p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </nav>

    <template x-teleport="body">
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-in-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in-out duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[100] xl:hidden" x-cloak>
            
            <div @click="mobileMenuOpen = false" class="absolute inset-0 bg-black/50"></div>

            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="relative w-[80%] max-w-sm h-full bg-white shadow-xl flex flex-col overflow-y-auto">
                
                <div class="p-4 flex justify-between items-center border-b border-gray-100">
                    <span class="font-bold text-[#006BB3]">MENU</span>
                    <button @click="mobileMenuOpen = false" class="text-gray-500">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="px-4 py-6 space-y-2">
                    <a href="/" class="block py-3 text-[#006BB3] font-bold border-b border-gray-50">HOME</a>
                    
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-[#006BB3] font-bold border-b border-gray-50 uppercase text-left">
                            Corporate Info <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="bg-gray-50 pl-4 py-2 space-y-2">
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">HISTORY</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">CORPORATE DATA</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">CORPORATE PROFILE</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">VISION MISSION & VALUE</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">CERTIFICATES</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">CSR</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-[#006BB3] font-bold border-b border-gray-50 uppercase text-left">
                            Products & Services <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="bg-gray-50 pl-4 py-2 space-y-2">
                            <a href="{{ route('products.index') }}" class="block py-2 text-sm text-[#006BB3] font-bold">PRODUCTS</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">PUMP TEST FACILITY</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-[#006BB3] font-bold border-b border-gray-50 uppercase text-left">
                            Pump Selector <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="bg-gray-50 pl-4 py-2 space-y-2">
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">PUMP SELECTOR 1</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">PUMP SELECTOR 2</a>
                        </div>
                    </div>

                    <a href="#" class="block py-3 text-[#006BB3] font-bold border-b border-gray-50 uppercase">QHSE</a>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-[#006BB3] font-bold border-b border-gray-50 uppercase text-left">
                            Media <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="bg-gray-50 pl-4 py-2 space-y-2">
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">PRESS RELEASE</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">GALLERY</a>
                            <a href="#" class="block py-2 text-sm text-[#006BB3] font-bold">RECENT PROJECT</a>
                        </div>
                    </div>

                    <a href="#" class="block py-3 text-[#006BB3] font-bold border-b border-gray-50 uppercase">CONTACT US</a>

                    <div class="pt-8 flex items-center space-x-6">
                        <a href="#" class="text-[#006BB3] hover:opacity-80"><svg class="h-6 w-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        <a href="#" class="text-[#006BB3] hover:opacity-80"><svg class="h-6 w-6 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.98 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.058-1.69-.072-4.949-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.209-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        <a href="#" class="text-[#006BB3] hover:opacity-80"><svg class="h-[24px] w-[24px] fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>