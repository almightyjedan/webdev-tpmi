<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pump Selector</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#D1E9F0] antialiased">
    @include('layouts.partials.navbar')

    <div class="pt-32 pb-20 max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-[#006BB3] text-5xl font-black italic uppercase">Select Category</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <a href="{{ route('pumpselector.ceno') }}" class="block p-16 bg-white rounded-[40px] shadow-xl text-center hover:scale-105 transition-transform">
                <h2 class="text-4xl font-black mb-4">CEN-O</h2>
                <p class="text-gray-500">End-Suction Centrifugal Pumps</p>
            </a>

            <a href="{{ route('pumpselector.censv') }}" class="block p-16 bg-white rounded-[40px] shadow-xl text-center hover:scale-105 transition-transform">
                <h2 class="text-4xl font-black mb-4">CEN-SV</h2>
                <p class="text-gray-500">Vertical Multistage Pumps</p>
            </a>
        </div>
    </div>

    @include('layouts.partials.footer')
    
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
</body>
</html>