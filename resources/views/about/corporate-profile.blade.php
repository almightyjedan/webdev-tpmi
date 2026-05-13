<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <title>Corporate Profile - Torishima</title>
</head>
<body class="bg-gray-50">
    @include('layouts.partials.navbar')

    @php
        // Decode Affiliates (Sekarang ada Name & Description)
        $affiliateList = is_string($corporate->affiliates) 
            ? json_decode($corporate->affiliates, true) 
            : ($corporate->affiliates ?? []);

        // Decode Quality & Safety Policy (Repeater: Title & Content)
        $policyList = is_string($corporate->quality_safety_policy) 
            ? json_decode($corporate->quality_safety_policy, true) 
            : ($corporate->quality_safety_policy ?? []);
    @endphp
    <section class="max-w-7xl mx-auto px-4 pt-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <div>
                <div class="flex items-end justify-between mb-10 border-b border-gray-800 pb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Corporate Profile
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
                <div class="prose max-w-none text-[15px] text-slate-600 leading-relaxed">
                    {!! $corporate->profile_content !!}
                </div>
            </div>
            <div>
                <div class="flex items-end justify-between mb-10 border-b border-gray-800 pb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Business Model Strategy
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
                <div class="bg-white p-2 border border-slate-200 rounded shadow-sm">
                    @if($corporate->strategy_image)
                    <img src="{{ asset('storage/' . $corporate->strategy_image) }}" alt="Business Strategy" class="w-full h-auto">
                    @else
                    <div class="aspect-video bg-slate-100 flex items-center justify-center text-slate-400 italic">
                        Strategy Diagram Not Available
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 pt-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Quality & Safety Policy
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>

        {{-- Container Alpine.js untuk Tabs --}}
        <div x-data="{ activeTab: 0 }" class="mb-20">
            {{-- List Tombol Tab --}}
            <div class="flex flex-wrap items-center bg-gray-50 border-t border-x border-gray-200">
                @foreach($policyList as $index => $policy)
                    <button 
                        @click="activeTab = {{ $index }}"
                        :class="activeTab === {{ $index }} ? 'bg-[#9181CB] text-white' : 'bg-transparent text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-4 text-sm font-bold uppercase tracking-wider transition-all duration-200 border-r border-gray-200 outline-none"
                    >
                        {{ $policy['title'] ?? 'Policy Item' }}
                    </button>
                @endforeach
            </div>

            {{-- Kotak Isi Tab --}}
            <div class="border border-gray-200 p-6 md:p-10 bg-[#F9F9F9] min-h-[200px]">
                @foreach($policyList as $index => $policy)
                    <div 
                        x-show="activeTab === {{ $index }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="prose max-w-none text-[15px] leading-relaxed text-gray-600"
                    >
                        {!! $policy['content'] ?? '' !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 pt-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Core Competence
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>

        <div class="mb-12">
            <div class="prose max-w-none text-[15px] text-gray-600 leading-relaxed">
                {!! $corporate->core_competence_content !!}
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Affiliations
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-1 gap-y-10">
                @foreach($affiliateList as $aff)
                <div class="group">
                    <h4 class="font-bold text-[16px] uppercase tracking-tight mb-2">
                        {{ $aff['name'] ?? '-' }}
                    </h4>
                    @if(!empty($aff['description']))
                    <div class="text-gray-600 text-[15px] leading-relaxed prose max-w-none">
                        {!! $aff['description'] !!}
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
    </section>
    @include('layouts.partials.footer')
</body>
</html>