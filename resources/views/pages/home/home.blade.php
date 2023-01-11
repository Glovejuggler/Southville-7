@extends('layouts.master')

@section('content')
<div class="h-screen bg-theme-800 overflow-hidden relative flex items-center lg:justify-start justify-center"
    id="header">
    <div class="bg-theme-800 opacity-80 z-40 w-full h-full absolute"></div>
    <img id="header-img" src="{{ asset('images/bg_1.jpg') }}"
        class="z-30 w-full h-full absolute object-cover transition-all duration-500 ease-in-out animate-fade-in" alt="">
    <div class="z-40 lg:my-0 my-10">
        <div class="text-white lg:text-7xl text-3xl leading-tight font-semibold mx-96 animate-fade-in">Southville 7
            Credit
            Cooperative</div>
        <div class="mt-8 text-white lg:text-4xl text-xl leading-tight font-bold mx-96 animate-fade-in">
            <span class="text-[#ed7464] font-extrabold">Strength</span> in members
        </div>
    </div>
</div>

<div class="mb-12" id="services">
    <div class="pt-20 px-8 pb-8 bg-theme-50/10">
        <div id="servicesTitle"
            class="text-4xl text-center font-bold text-theme-800 uppercase transition-all duration-[1500ms] ease-out -translate-y-1/4 opacity-0 underline decoration-8 decoration-[#ed7464]">
            Services
        </div>
        <div id="serviceIcons"
            class="mt-8 flex justify-center space-x-8 transition-all duration-[1500ms] ease-out -translate-x-1/4 opacity-0">
            <div class="flex flex-col space-y-8">
                <div class="w-48 h-48 overflow-hidden">
                    <img src="{{ asset('images/loan-icon.png') }}" alt="">
                </div>
                <div class="text-center text-theme-800 font-semibold text-lg uppercase">
                    Reliable loans
                </div>
            </div>
            <div class="flex flex-col space-y-8">
                <div class="w-48 h-48 overflow-hidden">
                    <img src="{{ asset('images/savings-icon.png') }}" alt="">
                </div>
                <div class="text-center text-theme-800 font-semibold text-lg uppercase">
                    Secured savings
                </div>
            </div>
        </div>
    </div>
</div>

<div class="my-12 p-1 translate-x-1/3 opacity-0 transition-all duration-[1500ms] ease-out" id="start">
    <div class="max-w-7xl mx-auto bg-white rounded-lg p-8">
        <div class="lg:flex items-center justify-between">
            <div class="lg:w-1/2 flex flex-col">
                <span
                    class="font-extrabold text-4xl uppercase text-theme-800 underline decoration-8 decoration-[#ed7464]">Best
                    loan options</span>
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
<div class="my-12" id="stories">
    <div class="max-w-7xl mx-auto p-8">
        <div class="">
            <div class="text-4xl text-center font-bold uppercase text-theme-800 transition-all duration-[1500ms] ease-out -translate-y-1/4 opacity-0 underline decoration-8 decoration-[#ed7464]"
                id="postsTitle">
                Stories
            </div>
            <div class="mt-4 flex flex-col md:flex-row justify-center space-y-2 md:space-y-0 md:space-x-2 transition-all -translate-x-1/3 opacity-0 duration-[1500ms] ease-out"
                id="posts">
                @foreach ($stories as $story)
                <a href="{{ route('story', $story) }}"
                    class="group hover:-translate-y-2 hover:shadow-lg duration-300 ease-in-out transition-all border bg-white border-theme-800 p-0 rounded-lg w-full md:w-1/3">
                    <div class="overflow-hidden h-48 rounded-t-lg">
                        @if ($story->photos->count())
                        <img src="{{ $story->photos->first()?->path }}"
                            class="object-cover group-hover:scale-125 transition-all duration-300 ease-in-out" alt="">
                        @else
                        <div class="h-full w-full bg-slate-300 flex items-center justify-center">
                            <i class="bx bx-image text-4xl group-hover:text-5xl duration-300 ease-in-out"></i>
                        </div>
                        @endif
                    </div>
                    <div class="mt-2 flex flex-col p-4">
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
            href="{{ route('stories') }}">
            See more
        </a>
    </div>
</div>
@endif

<div class="my-12">
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
    var i = 1;
    const headImg = document.querySelector('#header-img')
    headImg.addEventListener('animationend', function() {
        headImg.classList.remove('animate-fade-in')
    })
    setInterval(() => {
        i = i<4 ? i+1 : 1
        headImg.src = `/images/bg_${i}.jpg`
        headImg.classList.add('animate-fade-in')
        headImg.addEventListener('animationend', function() {
            headImg.classList.remove('animate-fade-in')
        }, {once: true})
    }, 5000);

    const nav = document.querySelector('#nav');
    const head = document.querySelector('#header');
    const navlinks = document.querySelectorAll('.nav-link');
    const login = document.querySelector('#login');
    const toggle = document.querySelector('#toggle');

    const options = {
        root: null,
        threshold: 0,
        rootMargin: '0px'
    };

    const navObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if(!entry.isIntersecting) {
                nav.classList.remove('bg-transparent')
                nav.classList.add('bg-white', 'shadow-md')
                navlinks.forEach(element => {
                    element.classList.remove('text-white')
                    element.classList.add('text-theme-800')
                });
                login.classList.remove('border-white', 'text-white', 'hover:bg-white', 'hover:text-theme-800')
                login.classList.add('border-black', 'text-black', 'hover:bg-black', 'hover:text-white')
                toggle.classList.remove('text-white', 'border-white')
                toggle.classList.add('text-theme-800', 'border-theme-800')
            } else {
                nav.classList.add('bg-transparent')
                nav.classList.remove('bg-white', 'shadow-md')
                navlinks.forEach(element => {
                    element.classList.remove('text-theme-800')
                    element.classList.add('text-white')
                });
                login.classList.add('border-white', 'text-white', 'hover:bg-white', 'hover:text-theme-800')
                login.classList.remove('border-black', 'text-black', 'hover:bg-black', 'hover:text-white')
                toggle.classList.add('text-white', 'border-white')
                toggle.classList.remove('text-theme-800', 'border-theme-800')
            }
        });
    }, options);

    navObserver.observe(head);

    const startObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelector('#start').classList.remove('translate-x-1/3', 'opacity-0')
                observer.unobserve(document.querySelector('#start'))
            }
        });
    }, {
        threshold: 0, root: null, rootMargin: '-150px'
    });

    startObserver.observe(document.querySelector('#start'));

    const storiesObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelector('#posts').classList.remove('-translate-x-1/3', 'opacity-0')
                document.querySelector('#postsTitle').classList.remove('-translate-x-1/4', 'opacity-0')
                observer.unobserve(document.querySelector('#stories'))
            }
        });
    }, {
        threshold: 0, root: null, rootMargin: '-150px'
    })

    storiesObserver.observe(document.querySelector('#stories'))

    const servicesObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelector('#servicesTitle').classList.remove('opacity-0', '-translate-y-1/4')
                document.querySelector('#serviceIcons').classList.remove('opacity-0', '-translate-x-1/4')
                observer.unobserve(document.querySelector('#services'))
            }
        });
    }, {
        threshold: 0, root: null, rootMargin: '-150px'
    })

    servicesObserver.observe(document.querySelector('#services'))
</script>
@endsection

@section('styles')
<style>
    @keyframes fade-in {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes slide-in-from-left {
        0% {
            transform: translateX(-30%)
        }

        100% {
            transform: translateX(0)
        }
    }

    @keyframes slide-in-from-right {
        0% {
            transform: translateX(30%)
        }

        100% {
            transform: translate(0)
        }
    }

    .animation-logo {
        animation-name: fade-in, slide-in-from-left;
        animation-duration: 1000ms;
        animation-iteration-count: 1;
        animation-timing-function: ease-out
    }

    .animate-fade-in {
        animation-name: fade-in;
        animation-duration: 1000ms;
        animation-iteration-count: 1;
        animation-timing-function: ease-in-out;
    }

    .animation-blo {
        animation-name: fade-in, slide-in-from-left;
        animation-duration: 1000ms;
        animation-iteration-count: 1;
        animation-timing-function: ease-out
    }

    .animation-blo-img {
        animation-name: fade-in, slide-in-from-right;
        animation-duration: 1000ms;
        animation-iteration-count: 1;
        animation-timing-function: ease-out
    }
</style>
@endsection