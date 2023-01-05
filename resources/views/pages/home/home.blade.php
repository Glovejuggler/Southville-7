@extends('layouts.master')

@section('content')
<div class="lg:h-screen h-auto bg-theme-800 text-white flex justify-start p-8 lg:p-20 ease-in-out duration-200"
    id="header">
    <div
        class="max-w-screen-2xl mx-auto px-8 flex lg:flex-row flex-col lg:items-center justify-center lg:justify-around">
        <img src="images/logo.png" class="rounded-full w-1/2 lg:w-1/3 self-center" alt="">
        <div class="w-full lg:w-1/3">
            <span class="flex text-lg mb-10 leading-tight">
                Strength in members
            </span>
            <a href="#start"
                class="p-3 lg:w-1/3 w-full border-2 text-sm border-white rounded-lg uppercase hover:bg-white hover:text-theme-800 font-semibold ease-in-out duration-300">Get
                started</a>
        </div>
    </div>
</div>

<div class="my-12 p-1" id="start">
    <div class="max-w-7xl mx-auto bg-white rounded-lg p-8">
        <div class="lg:flex items-center justify-between">
            <div class="lg:w-1/2 flex flex-col">
                <span class="font-extrabold text-4xl text-theme-800">Best loan options</span>
                <span class="mt-8 text-lg font-semibold italic">Ang pautang ng kooperatiba ay may pinakamababang
                    interest
                    na
                    3% sa mga
                    miyembro</span>
            </div>
            <div class="flex lg:block justify-center">
                <img src="images/loan.png" class="lg:w-auto lg:h-96 h-auto" alt="">
            </div>
        </div>
    </div>
</div>

@if ($stories->count())
<div class="my-8">
    <div class="max-w-7xl mx-auto p-8">
        <div class="">
            <div class="text-4xl text-center font-bold uppercase text-theme-800">
                Stories
            </div>
            <div class="mt-4 flex flex-col md:flex-row justify-center space-y-2 md:space-y-0 md:space-x-2">
                @foreach ($stories as $story)
                <a href="{{ route('archive', $story) }}"
                    class="group hover:bg-black/5 duration-200 ease-in-out transition-all border border-theme-800 p-4 rounded-lg w-full md:w-1/3">
                    <div class="overflow-hidden h-48">
                        @if ($story->photos->count())
                        <img src="{{ $story->photos->first()?->path }}"
                            class="object-cover group-hover:scale-125 transition-all duration-200 ease-in-out" alt="">
                        @else
                        <div class="h-full w-full bg-slate-300 flex items-center justify-center">
                            <i class="bx bx-image text-4xl group-hover:text-5xl duration-200 ease-in-out"></i>
                        </div>
                        @endif
                    </div>
                    <div class="mt-4 flex flex-col">
                        <span class="font-bold text-theme-800">{{ $story->title }}</span>
                        <span class="text-xs">{{ $story->created_at->isoformat('MMMM D, YYYY') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto text-center">
        <a class="mt-4 border border-theme-800 hover:bg-theme-800 hover:text-white duration-300 ease-in-out p-3"
            href="{{ route('events') }}">
            See more
        </a>
    </div>
</div>
@endif

<div class="my-8">
    <div class="max-w-screen-2xl mx-auto px-8">
        <div class="flex justify-center mt-12">
            <span class="text-black leading-tight w-full lg:w-10/12">
                <p class="uppercase font-semibold block mb-3">Requirements to become a member</p>
                <span class="block">
                    1. Must be a legitimate resident of Southville 7 (Our cooperative will be open to more areas in the
                    future)
                </span>
                <span class="block">
                    2. Must fill up the application form to be reviewed by the board
                </span>
                <span class="block">
                    3. Must attend the Pre-membership Education Seminar after the application is approved
                </span>
            </span>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const nav = document.querySelector('#nav');
    const head = document.querySelector('#header');
    const title = document.querySelector('#title');
    const navlinks = document.querySelectorAll('.nav-link');
    const login = document.querySelector('#login');

    const options = {
        root: null,
        threshold: 0,
        rootMargin: '-150px'
    };

    const navObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if(!entry.isIntersecting) {
                console.log(entry.target);
                nav.classList.remove('bg-transparent')
                nav.classList.add('bg-white', 'shadow-md')
                title.classList.add('text-theme-800')
                title.classList.remove('text-white')
                navlinks.forEach(element => {
                    element.classList.remove('text-white')
                    element.classList.add('text-theme-800')
                });
                login.classList.remove('border-white', 'text-white', 'hover:bg-white', 'hover:text-theme-800')
                login.classList.add('border-black', 'text-black', 'hover:bg-black', 'hover:text-white')
            } else {
                nav.classList.add('bg-transparent')
                nav.classList.remove('bg-white', 'shadow-md')
                title.classList.add('text-white')
                title.classList.remove('text-theme-800')
                navlinks.forEach(element => {
                    element.classList.remove('text-theme-800')
                    element.classList.add('text-white')
                });
                login.classList.add('border-white', 'text-white', 'hover:bg-white', 'hover:text-theme-800')
                login.classList.remove('border-black', 'text-black', 'hover:bg-black', 'hover:text-white')
            }
        });
    }, options);

    navObserver.observe(head);
</script>
@endsection