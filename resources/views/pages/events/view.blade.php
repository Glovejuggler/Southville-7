@extends('layouts.master')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
    {{-- Title --}}
    <div class="mb-6 flex flex-col">
        <span class="font-bold text-2xl text-theme-800">{{ $event->title }}</span>
        <span>{{ $event->date->isoformat('MMMM D, YYYY') }}</span>
    </div>

    {{-- Content --}}
    <div class="text-justify">
        <span>{!! nl2br($event->content) !!}</span>
    </div>

    {{-- Back to events --}}
    <a href="{{ route('events') }}"
        class="w-full rounded-lg py-3 px-5 uppercase mt-8 bg-theme-800 hover:bg-theme-600 hover:px-2 duration-300 ease-in-out active:bg-theme-900 flex items-center justify-between text-white font-semibold">
        <i class="bx bxs-left-arrow place-self-left"></i>
        <span>events</span>
        <p></p>
    </a>
</div>
@endsection