<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pump Test Facility - Torishima Pumps Indonesia</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .hero-gradient {
            background: linear-gradient(90deg, #3A3FFF 0%, #7C7FFF 100%);
        }
    </style>
</head>
<body class="bg-white antialiased">

    @include('layouts.partials.navbar')

    @if($pumpTestFacility)
        
        <div class="w-full px-6 mt-6">
            <div class="relative w-full">
                @if($pumpTestFacility->hero_image)
                    <img src="{{ asset('storage/' . $pumpTestFacility->hero_image) }}" class="w-full h-auto block z-0">
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

            <div class="mb-10 prose prose-slate max-w-none text-gray-600 leading-relaxed text-justify prose-ol:list-decimal prose-ul:list-disc prose-ol:pl-5 prose-ul:pl-5">
                    {!! $pumpTestFacility->main_description !!}
                </div>

            @if($pumpTestFacility->specifications)
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Specification of Pump Testing Facility
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>
            <div class="mb-10 overflow-x-auto border border-gray-200 rounded-sm shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="p-3 text-sm font-bold text-gray-700 uppercase tracking-wider w-1/3 border-r border-gray-200">Parameter</th>
                                <th class="p-3 text-sm font-bold text-gray-700 uppercase tracking-wider">Specification / Value</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-600">
                            @foreach($pumpTestFacility->specifications as $spec)
                                <tr class="hover:bg-gray-50/50">
                                    <td class="p-3 font-semibold bg-gray-50/30 border-r border-gray-200">{{ $spec['parameter'] }}</td>
                                    <td class="p-3 text-justify">{{ $spec['value'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if($pumpTestFacility->equipments)
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Equipment of Pump Testing
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>
            <div class="mb-10 overflow-x-auto border border-gray-200 rounded-sm shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="p-3 text-sm font-bold text-gray-700 uppercase tracking-wider w-1/3 border-r border-gray-200">Equipment / Item Name</th>
                                <th class="p-3 text-sm font-bold text-gray-700 uppercase tracking-wider">Qty & Specification Detail</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-600">
                            @foreach($pumpTestFacility->equipments as $equipment)
                                <tr class="hover:bg-gray-50/50">
                                    <td class="p-3 font-semibold bg-gray-50/30 border-r border-gray-200">{{ $equipment['name'] }}</td>
                                    <td class="p-3 text-justify">{{ $equipment['qty_or_spec'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Pump Test Lines
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>
                <div class="mb-10 prose prose-slate max-w-none text-gray-600 leading-relaxed text-justify prose-ol:list-decimal prose-ul:list-disc">
                    {!! $pumpTestFacility->pump_test_lines !!}
                </div>

            @if($pumpTestFacility->pump_test_with_engine)
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Pump Test Lines
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>
            <div class="mb-10 overflow-x-auto border border-gray-200 rounded-sm shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="p-3 text-sm font-bold text-gray-700 uppercase tracking-wider w-1/3 border-r border-gray-200">Item</th>
                                <th class="p-3 text-sm font-bold text-gray-700 uppercase tracking-wider">Detail Specification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-600">
                            @foreach($pumpTestFacility->pump_test_with_engine as $engineData)
                                <tr class="hover:bg-gray-50/50">
                                    <td class="p-3 font-semibold bg-gray-50/30 border-r border-gray-200">{{ $engineData['item'] }}</td>
                                    <td class="p-3 text-justify">{{ $engineData['detail'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

           @if($pumpTestFacility->latest_activities)
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 border-b border-gray-800 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                        Latest Activity
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
                    </h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($pumpTestFacility->latest_activities as $activity)
                        <div class="group h-[240px] w-full [perspective:1000px]">
                            <div class="relative h-full w-full transition-all duration-700 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)]">
                                
                                <div class="absolute inset-0 h-full w-full [backface-visibility:hidden]">
                                    <img src="{{ asset('storage/' . $activity['image']) }}" class="h-full w-full object-cover rounded-md border border-gray-200 shadow-sm">
                                </div>
                                
                                <div class="absolute inset-0 h-full w-full bg-[#EFEFEF] rounded-md p-6 text-gray-600 [transform:rotateY(180deg)] [backface-visibility:hidden] flex flex-col justify-center items-center text-center border border-gray-200">
                                    <div class="prose prose-sm text-gray-600 font-medium leading-relaxed max-w-none">
                                        {!! $activity['description'] !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </main>
    @else
        <div class="container mx-auto px-4 py-32 text-center">
            <i class="fa-solid fa-flask text-gray-200 text-6xl mb-4"></i>
            <h2 class="text-xl font-bold text-gray-400 uppercase tracking-widest">Fasilitas Belum Tersedia</h2>
            <p class="text-gray-400 mt-2">Silakan isi data Pump Test Facility melalui panel admin Filament.</p>
        </div>
    @endif

    @include('layouts.partials.footer')
    
</body>
</html>