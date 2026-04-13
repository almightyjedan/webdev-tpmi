    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Torishima Services Indonesia</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
    <body class="antialiased font-sans bg-gray-50">

        @include('layouts.partials.navbar') 
        
        <main class="relative w-full h-screen lg:h-[calc(100vh-130px)] flex items-center overflow-hidden">
            
            <div class="absolute inset-0 z-0">
                <video autoplay muted loop playsinline class="w-full h-auto">
                    <source src="{{ asset('images/homepage/.webp') }}" type="video/webp">
                    <source src="{{ asset('images/homepage/ANIMASI-TORISHIMA-525px.mp4') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-black/20"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-20 lg:mt-32">
                
                <div class="flex flex-col space-y-6">
                    
                    <div class="w-full max-w-[280px] lg:max-w-[350px] opacity-93">
                        <div class="bg-white backdrop-blur-sm p-6 lg:p-8 rounded-tr-[50px] rounded-bl-[50px] shadow-2xl">
                            <img src="{{ asset('images/homepage/zone_1_img2.webp') }}" 
                                alt="Evolution Teamwork Diversity" 
                                class="w-full h-auto">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-0 shadow-2xl rounded-2xl overflow-hidden max-w-5xl">
                        
                        <div class="bg-[#006BB3] p-8 text-white border-r border-white/10 group hover:bg-[#005a96] transition-colors">
                            <div class="flex flex-col">
                                <div class="mb-4">
                                    <svg class="w-10 h-10 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-3 tracking-tight">Power Generation</h3>
                                <p class="text-[13px] leading-relaxed opacity-90 font-light">
                                    Torishima pumps are highly engineered for the most demanding services in thermal, geothermal, and renewable power plants.
                                </p>
                            </div>
                        </div>

                        <div class="bg-[#0081D6] p-8 text-white border-r border-white/10 group hover:bg-[#0073c0] transition-colors">
                            <div class="flex flex-col">
                                <div class="mb-4">
                                    <svg class="w-10 h-10 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-3 tracking-tight">Waterworks</h3>
                                <p class="text-[13px] leading-relaxed opacity-90 font-light">
                                    Provides reliable and high-efficiency pumps for every critical stage of the water cycle: Raw Water Intake, Treatment, and Flood Control.
                                </p>
                            </div>
                        </div>

                        <div class="bg-[#00558E] p-8 text-white group hover:bg-[#004a7c] transition-colors">
                            <div class="flex flex-col">
                                <div class="mb-4">
                                    <svg class="w-10 h-10 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        <path d="M12 12v.01M12 15v.01M12 18v.01"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-3 tracking-tight">Oil & Gas</h3>
                                <p class="text-[13px] leading-relaxed opacity-90 font-light">
                                    Standardized and customizable pumps that ensure critical processes run reliably, from clean water to abrasive slurries.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>

        <section class="bg-white py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-16">
                    <h2 class="text-[#006BB3] text-3xl lg:text-4xl font-bold uppercase tracking-wider">
                        Welcome to PT Torishima Pump Mfg Indonesia
                    </h2>
                    <div class="w-24 h-1 bg-[#0081D6] mx-auto mt-4"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                    
                    <div class="lg:col-span-4 space-y-8">
                        <div class="relative p-6 border-l-4 border-[#006BB3] bg-gray-50 rounded-r-xl shadow-sm">
                            <div class="absolute -left-3 top-6 bg-[#006BB3] text-white p-1 rounded-full">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path></svg>
                            </div>
                            <p class="text-gray-700 italic font-medium leading-relaxed">
                                "To be recognized as a world class pump manufacture company committed to excellence."
                            </p>
                            <p class="text-[#006BB3] text-sm font-bold mt-3 uppercase tracking-tighter">- Vision of PT. Torishima Pump Mfg. Indonesia</p>
                        </div>

                        <div class="relative p-6 border-l-4 border-[#0081D6] bg-gray-50 rounded-r-xl shadow-sm">
                            <div class="absolute -left-3 top-6 bg-[#0081D6] text-white p-1 rounded-full">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path></svg>
                            </div>
                            <p class="text-gray-700 font-semibold leading-relaxed">
                                We Develop, manufacture and provide high quality industrial pumps to satisfy customer requirement in infrastructure and industry for domestic and international market.
                            </p>
                            <p class="text-[#0081D6] text-sm font-bold mt-3 uppercase tracking-tighter">- Mission of PT. Torishima Pump Mfg. Indonesia</p>
                        </div>
                    </div>

                    <div class="lg:col-span-8">
                        <div class="prose prose-blue max-w-none text-gray-600 leading-loose">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2 inline-block">About Us / History</h3>
                            
                            <p class="mb-6">
                                PT. Torishima Pump Mfg. Indonesia is a joint venture between Torishima Pump Mfg., Co., Ltd of Japan and PT Guna Elektro of Indonesia. Known as PT Torishima Guna Indonesia since its establishment in 1984, has been serving a wide range of product requirements and customers – from handling clean water system to handling high slurry content liquid; from installing cooling and heating facilities in high rise buildings to providing pump systems in remote areas.
                            </p>

                            <p class="mb-6">
                                In the industries known for its demand of excellent services, PT. Torishima Pump Mfg. Indonesia holds great pride of being widely acknowledged as the reliable pump manufacturer. As a learning organization, our capabilities are strengthened with corporate culture in continuous improvement and a commitment to excellence.
                            </p>

                            <p class="mb-6">
                                PT. Torishima Pump Mfg. Indonesia has established strong sales and distribution network by building dealerships and other sales channels, which in turn can serve all our customer’s need. PT. Torishima Pump Mfg. Indonesia is currently distributing both standard and tailor-made industrial pumps not only in the Indonesian market but also throughout the South East Asia Region.
                            </p>

                            <div class="bg-[#006BB3]/5 p-6 rounded-xl border border-[#006BB3]/10 italic text-[14px]">
                                In compliance with Torishima’s policy, we provide international warranty service that is provided for every product. We realize that the cornerstone of our success lies in our total dedication to ensuring our customer’s satisfaction. We are confident that, in an ever-changing environment, our flexibility in service approach, customer focus policy, extensive knowledge of the industry and dependability at all time will continue to position PT. Torishima Pump Mfg. Indonesia as the industry’s preferred business partner in pumps solutions.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="bg-[#D1E9F0] py-16 lg:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-12">
                    <h2 class="text-[#0000FF] text-3xl lg:text-4xl font-black uppercase italic tracking-tighter">
                        OUR VALUE
                    </h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-6 lg:gap-4 mb-20">
                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-12 h-12 mb-3 text-[#006BB3] transition-transform duration-300 group-hover:animate-bounce">
                            <i data-lucide="trophy" class="w-full h-full"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 uppercase text-[20px] mb-1 tracking-widest">Valuable</h4>
                        <p class="text-[14px] text-gray-600 leading-tight max-w-[130px]">Recognize employees as the most valuable resources.</p>
                    </div>

                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-12 h-12 mb-3 text-[#006BB3] transition-transform duration-500 group-hover:rotate-[360deg]">
                            <i data-lucide="smile" class="w-full h-full"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 uppercase text-[20px] mb-1 tracking-widest">Satisfy</h4>
                        <p class="text-[14px] text-gray-600 leading-tight max-w-[130px]">Committed to total customer satisfaction.</p>
                    </div>

                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-12 h-12 mb-3 text-[#006BB3] transition-all duration-300 group-hover:scale-110">
                            <i data-lucide="clipboard-check" class="w-full h-full"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 uppercase text-[20px] mb-1 tracking-widest">Ethic</h4>
                        <p class="text-[14px] text-gray-600 leading-tight max-w-[130px]">Conduct business ethically.</p>
                    </div>

                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-12 h-12 mb-3 text-[#006BB3] transition-all duration-300 group-hover:scale-110">
                            <i data-lucide="shield-check" class="w-full h-full"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 uppercase text-[20px] mb-1 tracking-widest">Safety</h4>
                        <p class="text-[14px] text-gray-600 leading-tight max-w-[130px]">Protect and maintain a safe environment.</p>
                    </div>

                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-12 h-12 mb-3 text-[#006BB3] transition-transform duration-300 group-hover:-translate-y-2">
                            <i data-lucide="trending-up" class="w-full h-full"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 uppercase text-[20px] mb-1 tracking-widest">Improvement</h4>
                        <p class="text-[14px] text-gray-600 leading-tight max-w-[130px]">Adopt continuous improvement.</p>
                    </div>
                </div>

                <div class="mt-20">
                    <div class="text-center mb-12">
                        <h2 class="text-[#0000FF] text-3xl lg:text-4xl font-black uppercase italic tracking-tighter">
                            MANAGEMENT FOCUS
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                        
                        <div class="group flex flex-col bg-white/40 backdrop-blur-md p-6 lg:p-8 rounded-[30px] border border-white/50 shadow-lg transition-all duration-500 hover:bg-blue-600 hover:-translate-y-2">
                            <div class="flex flex-col items-center text-center h-full">
                                <div class="w-16 h-16 mb-6 bg-white rounded-2xl flex items-center justify-center shadow-md transform transition-transform duration-500 group-hover:rotate-12">
                                    <i data-lucide="user" class="w-8 h-8 text-blue-600"></i>
                                </div>
                                
                                <h3 class="text-lg font-black text-gray-800 uppercase mb-3 group-hover:text-white transition-colors">
                                    Corporate Philosophy
                                </h3>
                                
                                <p class="text-xs text-gray-600 leading-relaxed mb-6 group-hover:text-white/90 transition-colors">
                                    PT Torishima Pump Mfg. Indonesia is firmly committed to contributing to society in total harmony with environmental demands.
                                </p>
                                
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center text-blue-600 font-bold text-[14px] uppercase tracking-widest group-hover:text-white transition-colors">
                                        Learn about our Corporate Philosophy
                                        <i data-lucide="arrow-right" class="ml-2 w-3 h-3 transition-transform group-hover:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="group flex flex-col bg-white/40 backdrop-blur-md p-6 lg:p-8 rounded-[30px] border border-white/50 shadow-lg transition-all duration-500 hover:bg-blue-600 hover:-translate-y-2">
                            <div class="flex flex-col items-center text-center h-full">
                                <div class="w-16 h-16 mb-6 bg-white rounded-2xl flex items-center justify-center shadow-md transform transition-transform duration-500 group-hover:-rotate-12">
                                    <i data-lucide="key" class="w-8 h-8 text-blue-600"></i>
                                </div>
                                
                                <h3 class="text-lg font-black text-gray-800 uppercase mb-3 group-hover:text-white transition-colors">
                                    Core Competencies
                                </h3>
                                
                                <p class="text-xs text-gray-600 leading-relaxed mb-6 group-hover:text-white/90 transition-colors">
                                    PT. Torishima Pump Mfg. Indonesia has been manufacturing high quality pumps for more than 35 years. We concentrate our core competences in business sectors to which we bring our considerable know-how and experience.
                                </p>
                                
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center text-blue-600 font-bold text-[14px] uppercase tracking-widest group-hover:text-white transition-colors">
                                        Learn about our Core Competencies
                                        <i data-lucide="arrow-right" class="ml-2 w-3 h-3 transition-transform group-hover:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="group flex flex-col bg-white/40 backdrop-blur-md p-6 lg:p-8 rounded-[30px] border border-white/50 shadow-lg transition-all duration-500 hover:bg-blue-600 hover:-translate-y-2">
                            <div class="flex flex-col items-center text-center h-full">
                                <div class="w-16 h-16 mb-6 bg-white rounded-2xl flex items-center justify-center shadow-md transform transition-transform duration-500 group-hover:rotate-12">
                                    <i data-lucide="settings" class="w-8 h-8 text-blue-600"></i>
                                </div>
                                
                                <h3 class="text-lg font-black text-gray-800 uppercase mb-3 group-hover:text-white transition-colors">
                                    Experience
                                </h3>
                                
                                <p class="text-xs text-gray-600 leading-relaxed mb-6 group-hover:text-white/90 transition-colors">
                                    PT. Torishima Pump Mfg. Indonesia has a long experience of the design Pumping system. Our pumps are widely used in Indonesia, full filling customer, requirements effectively throughout the country.
                                </p>
                                
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center text-blue-600 font-bold text-[14px] uppercase tracking-widest group-hover:text-white transition-colors">
                                        Learn about our projects.
                                        <i data-lucide="arrow-right" class="ml-2 w-3 h-3 transition-transform group-hover:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-12 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-bold text-gray-700 uppercase tracking-wider">Projects Finished</span>
                                <span class="text-sm font-bold text-[#006BB3]">50%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-[#006BB3] h-2.5 rounded-full transition-all duration-1000" style="width: 50%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-bold text-gray-700 uppercase tracking-wider">Customer Satisfaction</span>
                                <span class="text-sm font-bold text-[#0081D6]">99%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-[#0081D6] h-2.5 rounded-full transition-all duration-1000" style="width: 99%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-[13px] leading-relaxed text-gray-600">
                        <p>
                            <span class="text-4xl font-bold text-[#006BB3] float-left mr-2 mt-1 leading-none">T</span>
                            orishima Pump Mfg. Indonesia is a company manufacturing pumps and pumping systems, including standard and custom. Our solutions are engineered in response to the challenge of the industry. By using state-of-the-art manufacturing facilities, PT. Torishima Pump Mfg. Indonesia is capable of producing world-class industrial pump product ranges.
                        </p>
                        <p>
                            PT. Torishima Pump Mfg. Indonesia encourages all employees to constantly upgrade themselves. Relevant product and skill trainings are consistently provided to enable its employees to keep abreast with the latest developments concerning their respected job scope. With this, performance of the staff will always stay competitive and up-to-date.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#1a1a1a] py-16 lg:py-24 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="mb-12">
                    <h3 class="text-2xl font-bold border-l-4 border-[#0081D6] pl-4 uppercase tracking-wider">Latest Project</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="group relative overflow-hidden rounded-xl bg-gray-800 aspect-[4/3]">
                        <img src="{{ asset('images/homepage/project1.jpg') }}" alt="Project 1" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-sm font-medium tracking-wide">Installation of high-pressure pump system for power plant.</p>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-xl bg-gray-800 aspect-[4/3]">
                        <img src="{{ asset('images/homepage/project2.jpg') }}" alt="Project 2" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-sm font-medium tracking-wide">Large scale waterworks infrastructure project.</p>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-xl bg-gray-800 aspect-[4/3]">
                        <img src="{{ asset('images/homepage/project3.jpg') }}" alt="Project 3" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-sm font-medium tracking-wide">Oil & Gas pumping solutions for offshore facilities.</p>
                        </div>
                    </div>

                </div>

                <div class="mt-12 text-center">
                    <a href="#" class="inline-block px-8 py-3 border border-[#0081D6] text-[#0081D6] hover:bg-[#0081D6] hover:text-white transition-all rounded-full font-bold uppercase text-xs tracking-widest">
                        View All Projects
                    </a>
                </div>

            </div>
        </section>

        <section class="bg-gray-50 py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex items-end justify-between mb-12">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-wider inline-block relative">
                            Recent News
                            <span class="absolute -bottom-2 left-0 w-12 h-1 bg-blue-600"></span>
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col h-full">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="{{ asset('images/news/news1.jpg') }}" alt="News 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors leading-snug">
                                Vibration and Noise? Know the Causes and Solution
                            </h3>
                            
                            <div class="flex items-center space-x-4 text-[11px] text-gray-400 mb-4 uppercase font-bold tracking-widest">
                                <span class="flex items-center"><i data-lucide="calendar" class="w-3 h-3 mr-1"></i> July 10, 2025</span>
                                <span class="flex items-center"><i data-lucide="message-circle" class="w-3 h-3 mr-1"></i> 0 Comments</span>
                            </div>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                Industrial pumps that vibrate and make loud noises not only disrupt operations but can also be an early indication of damage to the...
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="#" class="text-blue-600 text-[11px] font-black uppercase tracking-tighter flex items-center group/btn">
                                    Read More 
                                    <i data-lucide="arrow-right" class="w-3 h-3 ml-1 transition-transform group-hover/btn:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col h-full">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="{{ asset('images/news/news2.jpg') }}" alt="News 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors leading-snug">
                                E-Waste Management Process | Safe Recycling & Disposal
                            </h3>
                            
                            <div class="flex items-center space-x-4 text-[11px] text-gray-400 mb-4 uppercase font-bold tracking-widest">
                                <span class="flex items-center"><i data-lucide="calendar" class="w-3 h-3 mr-1"></i> July 1, 2025</span>
                                <span class="flex items-center"><i data-lucide="message-circle" class="w-3 h-3 mr-1"></i> 0 Comments</span>
                            </div>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                Referring to the Ministry of Environment and Forestry's regulation regarding the management of specific waste (e-waste or el...
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="#" class="text-blue-600 text-[11px] font-black uppercase tracking-tighter flex items-center group/btn">
                                    Read More 
                                    <i data-lucide="arrow-right" class="w-3 h-3 ml-1 transition-transform group-hover/btn:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col h-full">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="{{ asset('images/news/news3.jpg') }}" alt="News 3" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors leading-snug">
                                PALMEX 2025 – We have upgraded to a bigger space!
                            </h3>
                            
                            <div class="flex items-center space-x-4 text-[11px] text-gray-400 mb-4 uppercase font-bold tracking-widest">
                                <span class="flex items-center"><i data-lucide="calendar" class="w-3 h-3 mr-1"></i> June 15, 2025</span>
                                <span class="flex items-center"><i data-lucide="message-circle" class="w-3 h-3 mr-1"></i> 0 Comments</span>
                            </div>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                We are excited to let you know that Torishima Indonesia will be attending Palmex Exhibition this year in Medan – North Sumat...
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="#" class="text-blue-600 text-[11px] font-black uppercase tracking-tighter flex items-center group/btn">
                                    Read More 
                                    <i data-lucide="arrow-right" class="w-3 h-3 ml-1 transition-transform group-hover/btn:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 text-center">
                    <a href="#" class="inline-block px-8 py-3 border border-[#0081D6] text-[#0081D6] hover:bg-[#0081D6] hover:text-white transition-all rounded-full font-bold uppercase text-xs tracking-widest">
                        View All News
                    </a>
                </div>

            </div>
        </section>
        @include('layouts.partials.footer')

        <script src="https://unpkg.com/lucide@latest">lucide.createIcons();</script>

    </body>
    </html>