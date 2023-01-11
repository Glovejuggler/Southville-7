@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="bg-white rounded-lg mt-5 p-8 text-center transition-all duration-1000 ease-out opacity-0 -translate-y-5"
            id="titleText">
            <span class="text-theme-800 font-bold text-4xl">Stories</span>
        </div>
        <div id="posts" class="transition-all duration-1000 ease-out opacity-0 translate-y-5">
            @foreach ($posts as $post)
            <a href="{{ route('story', $post) }}" class="group">
                <div class="hover:bg-black/10 p-4 mb-3 cursor-pointer flex space-x-2 lg:space-x-5">
                    <div
                        class="h-48 w-48 shrink-0 rounded-lg bg-slate-300 overflow-hidden flex items-center justify-center">
                        @if ($post->photos->count())
                        <img class="h-48 object-cover rounded-lg group-hover:scale-110 duration-200 ease-in-out transition-all"
                            src="../{{ $post->photos()->first()?->path }}" alt="">
                        @else
                        <i
                            class="bx bx-image text-4xl opacity-50 duration-200 ease-in-out transition-all group-hover:scale-110"></i>
                        @endif
                    </div>
                    <div class="">
                        <span class="font-bold text-theme-800">{{ $post->created_at->isoformat('MMMM D, YYYY') }}</span>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl py-2">{{ $post->title }}</span>
                            <span class="text-sm block line-clamp-3">{{
                                $post->content
                                }}</span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

            {{ $posts->links('pagination::simple-tailwind') }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.addEventListener('load', function() {
        document.querySelector('#titleText').classList.remove('opacity-0', '-translate-y-5')
        document.querySelector('#posts').classList.remove('opacity-0', 'translate-y-5')
    })
</script>
@endsection