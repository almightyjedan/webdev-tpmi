<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>{{ $news->title }} - Torishima</title>
</head>
<body class="bg-white">
    @include('layouts.partials.navbar')

    <div class="max-w-5xl mx-auto px-4 py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 uppercase leading-tight tracking-tight mb-6">
            {{ $news->title }}
        </h1>

        <div class="flex flex-wrap items-center gap-y-2 gap-x-6 py-4 border-y border-gray-200 mb-8 text-[11px] md:text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">
            <div class="flex items-center gap-2">
                <i class="fas fa-user text-gray-300"></i>
                <span>Posted by: <span class="text-gray-600">{{ $news->posted_by ?? 'Admin' }}</span></span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-calendar text-gray-300"></i>
                <span>{{ \Carbon\Carbon::parse($news->posted_at)->format('F d, Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-comment text-gray-300"></i>
                <span>No Comments</span>
            </div>
        </div>

        @if($news->image)
        <div class="mb-10 shadow-xl">
            <img src="{{ asset('storage/'.$news->image) }}" class="w-full h-auto rounded-sm">
        </div>
        @endif

        <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed lg:text-lg">
            {!! $news->description !!}
        </div>

        <div class="mt-12 pt-8 border-t border-gray-100">
            <a href="{{ url('/press-release') }}" class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-blue-900 uppercase tracking-widest transition">
                &larr; Back to Press Release
            </a>
        </div>
    </div>

    @include('layouts.partials.footer')
</body>
</html>