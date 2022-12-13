<div class="bg-white">
    <div class="max-w-screen-2xl mx-auto py-0 px-4 lg:px-8">
        <div class="flex flex-wrap justify-between items-center my-0 py-0">
            <a href="{{ route('home') }}" class="font-semibold text-xl text-theme-800 my-5">
                Southville 7
            </a>
            <div class="hidden lg:block ">
                <a href="{{ route('home') }}"
                    class="px-3 py-6 hover:text-theme-800 font-bold mx-2 {{ Route::is('home') ? 'text-theme-600 font-bold' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                    class="peer/about px-3 py-6 hover:text-theme-800 font-bold mx-2 {{ Route::is('about*') ? 'text-theme-600 font-bold' : '' }}">About
                    Us
                </a>
                @if (!Route::is('about*'))
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
                @endif
                <a href="{{ route('events') }}"
                    class="px-3 py-6 hover:text-theme-800 font-bold mx-2 {{ Route::is('events*') ? 'text-theme-600 font-bold' : '' }}">Events</a>
                <a href="{{ route('contacts') }}"
                    class="px-3 py-6 hover:text-theme-800 font-bold mx-2 {{ Route::is('contacts') ? 'text-theme-600 font-bold' : '' }}">Contacts</a>
                <a href="{{ route('login') }}"
                    class="px-3 py-4 rounded-lg font-medium hover:bg-black hover:text-white mx-2 border-2 border-black transition ease-in-out duration-200">Log
                    In</a>
            </div>
        </div>
    </div>
</div>