@extends('layouts.master')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
    {{-- Title --}}
    <div class="font-bold text-2xl text-theme-800 mb-6">
        {{ $post->title }}
    </div>

    {{-- Content --}}
    <div>
        <span>{!! nl2br($post->content) !!}</span>
    </div>

    {{-- Gallery/Photos --}}
    <div class="font-bold text-lg text-theme-800 my-6">
        Gallery
    </div>
    <div class="grid gap-2 grid-cols-4">
        @forelse ($post->photos as $photo)
        <div class="rounded-lg overflow-hidden">
            <img class="rounded-lg hover:scale-125 ease-in-out duration-200" src="../../{{ $photo->path }}" alt="">
        </div>
        @empty
        no photos
        @endforelse
    </div>
</div>
@endsection