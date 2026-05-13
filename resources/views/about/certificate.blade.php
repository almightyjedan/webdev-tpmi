<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Quality & Certificates - Torishima</title>
</head>
<body class="bg-white">
    @include('layouts.partials.navbar')

    @php
        $items = is_string($certificate->certificate_items) 
            ? json_decode($certificate->certificate_items, true) 
            : ($certificate->certificate_items ?? []);
    @endphp

    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex items-end justify-between mb-10 border-b border-gray-800 pb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 inline-block relative">
                Certificate
                <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#4A80D4]"></span>
            </h2>
        </div>

        <div class="text-slate-500 leading-7 mb-16 text-[15px] text-justify space-y-4">
            <p>
                <strong class="text-slate-700">PT Torishima Pump Mfg. Indonesia</strong> is a certified ISO 45001, ISO 14001 and ISO 9001 and by applying Total HES Management, Quality Management, PT Torishima Pump Mfg. Indonesia assures to protect and maintain a safety and healthy and always deliver excellent products and outstanding services.
            </p>
            <p>
                Our product also certified with BKI, allowing customers to recognize if our pump is manufactured according to the standards and regulations listed in BKI. We also the only local company which provide various kinds of the best quality local pumps, internationally standardized and having TKDN Certificates.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 lg:gap-10">
            @foreach($items as $item)
                <div class="flex flex-col items-center">
                    <div class="bg-white border border-gray-100 shadow-sm p-1 mb-6 hover:shadow-md transition-shadow">
                        @if(!empty($item['image']))
                            <img src="{{ asset('storage/' . $item['image']) }}" 
                                 alt="{{ $item['image_title'] ?? 'Certificate' }}" 
                                 class="w-full h-auto object-contain">
                        @else
                            <div class="w-full aspect-[3/4] bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-file-contract text-gray-300 text-3xl"></i>
                            </div>
                        @endif
                    </div>

                    <p class="text-center text-[13px] font-bold text-slate-600 uppercase tracking-tighter leading-tight px-2">
                        {{ $item['image_title'] ?? 'Untitled' }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    @include('layouts.partials.footer')
</body>
</html>