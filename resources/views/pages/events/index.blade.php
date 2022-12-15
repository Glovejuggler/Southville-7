@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        {{-- Upcoming Events --}}
        <div class="bg-white rounded-lg p-8 lg:w-9/12">
            <span class="text-theme-800 font-bold text-xl">Upcoming Events</span>
        </div>
        @forelse ($events as $event)
        <div class="hover:bg-black/10 p-4 rounded-lg mb-3 cursor-pointer">
            <span class="font-bold text-theme-800">{{ $event->date->isoformat('MMMM D, YYYY') }}</span>
            <div class="flex flex-col">
                <span class="font-bold text-xl py-2">{{ $event->title }}</span>
                <span class="text-sm">{{ $event->content }}</span>
            </div>
        </div>
        @empty
        <span class="p-4 italic">No upcoming events</span>
        @endforelse

        {{-- Past Events --}}
        <div class="bg-white rounded-lg mt-5 p-8 lg:w-9/12">
            <span class="text-theme-800 font-bold text-xl">Past Events</span>
        </div>
        @forelse ($posts as $post)
        <a href="{{ route('archive', $post) }}">
            <div class="hover:bg-black/10 p-4 rounded-lg mb-3 cursor-pointer">
                <span class="font-bold text-theme-800">{{ $post->created_at->isoformat('MMMM D, YYYY') }}</span>
                <div class="flex flex-col">
                    <span class="font-bold text-xl py-2">{{ $post->title }}</span>
                    <span class="text-sm">{{ Str::limit($post->content, 255) }}</span>
                </div>
            </div>
        </a>
        @empty
        <span class="p-4 italic">No past events</span>
        @endforelse
    </div>
</div>
@endsection