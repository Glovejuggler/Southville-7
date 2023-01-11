<div class="{{ Route::is('home') ? 'bg-transparent' : 'bg-white' }} z-50 fixed top-0 left-0 right-0 transition-all duration-200 ease-in-out"
    id="nav">
    <div class="max-w-screen-2xl mx-auto py-0 px-4 lg:px-8">
        <div class="flex flex-wrap justify-between items-center my-0 py-0">
            <a href="{{ route('home') }}" class="my-3 duration-200 transition-all ease-in-out h-12 w-12" id="title">
                <img src="{{ asset('images/logo.png') }}" class="rounded-full" alt="">
            </a>
            <div class="hidden lg:block">
                <a href="{{ route('home') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 nav-link {{ Route::is('home') ? 'font-bold' : '' }} transition-all duration-200 ease-in-out">Home</a>
                <a href="{{ route('about') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} peer/about px-3 py-6 mx-2 {{ Route::is('about*') ? 'font-bold' : '' }} nav-link transition-all duration-200 ease-in-out">About
                    Us
                </a>
                {{-- @if (!Route::is('about*'))
                <div class="hidden absolute peer-hover/about:flex hover:flex
                         w-[200px] mt-6 text-sm transition ease-in-out duration-200 delay-300
                         flex-col bg-white drop-shadow-lg rounded-lg ml-12">
                    <a class="px-5 py-3 hover:bg-theme-500 hover:text-white rounded-lg"
                        href="{{ route('about') }}">Cooperative
                        Profile</a>
                    <a class="px-5 py-3 hover:bg-theme-500 hover:text-white rounded-lg"
                        href="{{ route('about.vm') }}">Vision and
                        Mission</a>
                    <a class="px-5 py-3 hover:bg-theme-500 hover:text-white rounded-lg" href="#">History</a>
                    <a class="px-5 py-3 hover:bg-theme-500 hover:text-white rounded-lg"
                        href="{{ route('about.bod') }}">Board of
                        Directors</a>
                </div>
                @endif --}}
                <a href="{{ route('events') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 {{ Route::is('events', 'viewevent', 'archive') ? 'font-bold' : '' }} nav-link transition-all duration-200 ease-in-out">Events</a>
                <a href="{{ route('stories') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 {{ Route::is('story*', 'stories') ? 'font-bold' : '' }} nav-link transition-all duration-200 ease-in-out">Stories</a>
                <a href="{{ route('contacts') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 {{ Route::is('contacts') ? 'font-bold' : '' }} nav-link transition-all duration-200 ease-in-out">Contacts</a>
                <a href="{{ route('login') }}" id="login"
                    class="px-4 py-2 rounded-3xl mx-2 transition-all ease-in-out duration-200 border-2 {{ Auth::check() ? 'text-xs' : '' }} {{ Route::is('home') ? 'text-white border-white hover:bg-white hover:text-theme-800' : 'text-black border-black hover:bg-black hover:text-white' }}">{{
                    Auth::user()->name ?? 'Login' }}</a>
            </div>
            <div class="block lg:hidden">
                <div onclick="toggleNav()" id="toggle"
                    class="border-2 p-1 flex items-center rounded-lg cursor-pointer {{ Route::is('home') ? 'border-white text-white' : 'border-theme-800 text-theme-800' }}">
                    <i class="bx bx-menu text-3xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mobileNav"
    class="bg-white fixed inset-0 z-[69] translate-x-full overflow-y-auto transition-all duration-100 ease-in-out">
    <div class="w-full px-3 space-y-2 mt-20">
        <a href="{{ route('home') }}"
            class="p-3 rounded-lg active:bg-theme-500 active:text-white text-2xl flex {{ Route::is('home') ? 'text-white bg-theme-800' : 'bg-white text-black' }}">Home</a>
        <a href="{{ route('about') }}"
            class="p-3 rounded-lg active:bg-theme-500 active:text-white text-2xl flex {{ Route::is('about*') ? 'text-white bg-theme-800' : 'bg-white text-black' }}">About</a>
        <a href="{{ route('events') }}"
            class="p-3 rounded-lg active:bg-theme-500 active:text-white text-2xl flex {{ Route::is('events', 'viewevent', 'archive') ? 'text-white bg-theme-800' : 'bg-white text-black' }}">Events</a>
        <a href="{{ route('stories') }}"
            class="p-3 rounded-lg active:bg-theme-500 active:text-white text-2xl flex {{ Route::is('story*', 'stories') ? 'text-white bg-theme-800' : 'bg-white text-black' }}">Stories</a>
        <a href="{{ route('contacts') }}"
            class="p-3 rounded-lg active:bg-theme-500 active:text-white text-2xl flex {{ Route::is('contacts') ? 'text-white bg-theme-800' : 'bg-white text-black' }}">Contacts</a>
        <a href="{{ route('login') }}" class="p-3 rounded-lg active:bg-theme-500 active:text-white text-2xl flex">{{
            Auth::user()->name ?? 'Login' }}</a>
    </div>
    <div onclick="toggleNav()"
        class="fixed top-4 right-4 border-2 border-theme-800 bg-white cursor-pointer rounded-lg flex items-center p-1">
        <i class="bx bx-x text-3xl"></i>
    </div>
</div>