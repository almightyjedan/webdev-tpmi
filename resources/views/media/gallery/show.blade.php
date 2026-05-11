<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.partials.navbar')
    <div class="max-w-5xl mx-auto px-4 py-12">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 uppercase leading-tight tracking-tight mb-6">
        {{ $gallery->title }}
    </h1>

    <div class="flex flex-wrap items-center gap-y-2 gap-x-6 py-4 border-y border-gray-200 mb-8 text-[11px] md:text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span>Posted by: <span class="text-gray-600">{{ $gallery->user->name }}</span></span>
        </div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>{{ $gallery->created_at->format('F d, Y') }}</span>
        </div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>No Comments</span>
        </div>
    </div>

    <div class="bg-black w-full shadow-2xl overflow-hidden rounded-sm">
        @if($gallery->type === 'video')
            <div class="aspect-video relative group">
                <video id="gallery-video" controls class="w-full h-full" poster="{{ $gallery->thumbnail ? asset('storage/'.$gallery->thumbnail) : '' }}">
                    <source src="{{ asset('storage/'.$gallery->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @else
            <div class="flex justify-center bg-gray-100">
                <img src="{{ asset('storage/'.$gallery->file_path) }}" class="max-w-full h-auto shadow-inner">
            </div>
        @endif
    </div>

    <div class="mt-10 flex items-stretch border border-gray-200 text-sm">
        <div class="bg-gray-100 px-6 py-4 font-bold text-gray-700 border-r border-gray-200 uppercase tracking-tighter">
            Categories
        </div>
        <div class="px-6 py-4 text-blue-600 font-medium italic">
            {{ $gallery->category ?? 'Uncategorized' }}
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ url('/gallery') }}" class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-blue-900 uppercase tracking-widest transition">
            &larr; Back to Gallery
        </a>
    </div>
</div>
@include('layouts.partials.footer')
</body>
</html>