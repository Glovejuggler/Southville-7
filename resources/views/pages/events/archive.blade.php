@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        {{-- Events Archive --}}
        <div class="bg-white rounded-lg p-8 text-center">
            <span class="text-theme-800 font-bold text-4xl">Events Archive</span>
        </div>
        @forelse ($events as $event)
        <a class="hover:bg-black/10 p-4 mb-3 cursor-pointer flex flex-col" href="{{ route('viewevent', $event) }}">
            <span class="font-bold text-theme-800">{{ $event->date->isoformat('MMMM D, YYYY') }}</span>
            <div class="flex flex-col">
                <span class="font-bold text-xl py-2">{{ $event->title }}</span>
                <span class="text-sm block text-justify line-clamp-3">{{ $event->content }}</span>
            </div>
        </a>
        @empty
        <span class="p-4 italic">Nothing to show</span>
        @endforelse
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 lg:px-8 mb-8 mt-auto">
    <a href="{{ route('events') }}"
        class="flex justify-between items-center duration-200 ease-in-out bg-theme-800 hover:bg-theme-600 hover:px-3 active:bg-theme-900 py-3 px-5 uppercase rounded-lg text-white font-semibold">
        <i class="bx bxs-left-arrow"></i>
        <span>Events</span>
        <p></p>
    </a>
</div>
@endsection