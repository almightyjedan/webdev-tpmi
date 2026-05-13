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

        @php
            // Gunakan logika decode yang sudah terbukti berhasil di tempatmu
            $infoList = is_string($corporate->corporate_info) ? json_decode($corporate->corporate_info, true) : $corporate->corporate_info;
            $affiliateList = is_string($corporate->affiliates) ? json_decode($corporate->affiliates, true) : $corporate->affiliates;
            $facilityList = is_string($corporate->facilities) ? json_decode($corporate->facilities, true) : $corporate->facilities;

            // Helper untuk ikon agar mirip SS
            $getIcon = function($label) {
                $l = strtolower($label);
                if(str_contains($l, 'established')) return 'fa-calendar-alt';
                if(str_contains($l, 'capital')) return 'fa-money-bill-wave';
                if(str_contains($l, 'shareholders')) return 'fa-users';
                if(str_contains($l, 'employees')) return 'fa-user-tie';
                if(str_contains($l, 'office')) return 'fa-building';
                return 'fa-info-circle';
            };
        @endphp

        <section class="max-w-7xl mx-auto px-4 pt-16">
    
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Corporate Data
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>

            <div class="space-y-3 mb-16">
                @foreach($infoList ?? [] as $info)
                    <div class="flex items-center group">
                        <div class="w-10 flex-shrink-0">
                            <i class="fas {{ $getIcon($info['label'] ?? '') }} text-slate-400 group-hover:text-blue-600 transition-colors"></i>
                        </div>
                        
                        <div class="flex items-center text-[15px]">
                            <span class="font-bold text-slate-700 uppercase tracking-tight w-[180px] flex justify-between">
                                {{ $info['label'] ?? '-' }}
                                <span class="mr-2">:</span>
                            </span>
                            
                            <span class="text-slate-600 ml-2">
                                {{ $info['value'] ?? '-' }}
                            </span>
                        </div>
                    </div>
                @endforeach

                @if(!empty($affiliateList))
                    <div class="flex items-start group mt-4">
                        <div class="w-10 flex-shrink-0 pt-1">
                            <i class="fas fa-link text-slate-400 group-hover:text-blue-600 transition-colors"></i>
                        </div>
                        
                        <div class="flex flex-col text-[15px]">
                            <div class="flex items-center">
                                <span class="font-bold text-slate-700 uppercase tracking-tight w-[180px] flex justify-between">
                                    Affiliated Companies
                                    <span class="mr-2">:</span>
                                </span>
                                <span class="text-slate-400 italic text-sm ml-2">Consolidated Subsidiaries</span>
                            </div>
                            
                            <ul class="mt-3 ml-6 space-y-2">
                                @foreach($affiliateList ?? [] as $aff)
                                    <li class="flex items-center">
                                        <div class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-3"></div>
                                        <a href="#" class="text-blue-600 font-medium hover:underline text-sm">
                                            {{ is_array($aff) ? ($aff['name'] ?? '-') : $aff }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 pb-16">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Facilities
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>

            @if($corporate->facilities_description)
                <div class="text-slate-600 leading-relaxed mb-10 text-[15px] max-w-5xl text-justify">
                    {!! $corporate->facilities_description !!}
                </div>
            @endif

            <div class="overflow-hidden border border-slate-200 rounded-sm">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="py-4 px-6 text-slate-800 font-bold uppercase text-sm tracking-wider w-1/3 border-r border-slate-200">
                                Machine and Equipment
                            </th>
                            <th class="py-4 px-6 text-slate-800 font-bold uppercase text-sm tracking-wider">
                                Specification
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($facilityList ?? [] as $item)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-4 px-6 font-bold text-slate-700 align-top border-r border-slate-100 italic">
                                    {{ $item['name'] ?? '-' }}
                                </td>
                                <td class="py-4 px-6 text-slate-600 align-top text-[14px] leading-6 whitespace-pre-line">
                                    {{ $item['specs'] ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        @include('layouts.partials.footer')

    </body>
</html>