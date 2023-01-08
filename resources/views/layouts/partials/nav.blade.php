<div class="{{ Route::is('home') ? 'bg-transparent' : 'bg-white' }} z-50 fixed top-0 left-0 right-0 transition-all duration-200 ease-in-out"
    id="nav">
    <div class="max-w-screen-2xl mx-auto py-0 px-4 lg:px-8">
        <div class="flex flex-wrap justify-between items-center my-0 py-0">
            <a href="{{ route('home') }}" class="font-semibold text-xl text-theme-800 my-5" id="title">
                Southville 7
            </a>
            <div class="hidden lg:block ">
                <a href="{{ route('home') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 nav-link {{ Route::is('home') ? 'font-bold' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} peer/about px-3 py-6 mx-2 {{ Route::is('about*') ? 'font-bold' : '' }} nav-link">About
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
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 {{ Route::is('events*') ? 'font-bold' : '' }} nav-link">Events</a>
                <a href="{{ route('contacts') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-black' }} px-3 py-6 mx-2 {{ Route::is('contacts') ? 'font-bold' : '' }} nav-link">Contacts</a>
                <a href="{{ route('login') }}" id="login"
                    class="px-4 py-2 rounded-3xl mx-2 transition ease-in-out duration-200 border-2 {{ Auth::check() ? 'text-xs' : '' }} {{ Route::is('home') ? 'text-white border-white hover:bg-white hover:text-theme-800' : 'text-black border-black hover:bg-black hover:text-white' }}">{{
                    Auth::user()->name ?? 'Login' }}</a>
            </div>
            <div class="block lg:hidden">
                <div onclick="toggleNav()" id="toggle"
                    class="border-2 border-black text-black p-1 flex items-center rounded-lg cursor-pointer">
                    <i class="bx bx-menu text-3xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mobileNav"
    class="bg-white fixed inset-0 mt-[68px] hidden flex-col overflow-y-auto pt-4 transition-all duration-200 ease-in-out">
    <a href="{{ route('home') }}"
        class="p-3 bg-white hover:bg-theme-800 hover:text-white active:bg-theme-800 active:text-white">Home</a>
    <a href="{{ route('about') }}"
        class="p-3 bg-white hover:bg-theme-800 hover:text-white active:bg-theme-800 active:text-white">About</a>
    <a href="{{ route('events') }}"
        class="p-3 bg-white hover:bg-theme-800 hover:text-white active:bg-theme-800 active:text-white">Events</a>
    <a href="{{ route('contacts') }}"
        class="p-3 bg-white hover:bg-theme-800 hover:text-white active:bg-theme-800 active:text-white">Contacts</a>
    <a href="{{ route('login') }}"
        class="p-3 bg-white hover:bg-theme-800 hover:text-white active:bg-theme-800 active:text-white">Login</a>
</div>