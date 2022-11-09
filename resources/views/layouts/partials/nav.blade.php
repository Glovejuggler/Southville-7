<div class="bg-white">
    <div class="max-w-screen-2xl mx-auto py-0 px-4 lg:px-8">
        <div class="flex flex-wrap justify-between items-center my-0 py-0">
            <a href="{{ route('home') }}" class="font-semibold text-xl text-theme-800 my-5">
                Southville 7
            </a>
            <div class="hidden lg:block ">
                <a href="{{ route('home') }}"
                    class="px-3 py-6 font-medium hover:bg-black/10 mx-2 {{ Route::is('home') ? 'text-theme font-bold bg-black/20' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                    class="peer/about px-3 py-6 font-medium hover:bg-black/10 mx-2 {{ Route::is('about*') ? 'text-theme font-bold bg-black/20' : '' }}">About
                    Us
                </a>
                <div class="hidden absolute peer-hover/about:flex hover:flex
                         w-[200px]
                         flex-col bg-white drop-shadow-lg">
                    <a class="px-5 py-3 hover:bg-gray-200" href="#">About Us</a>
                    <a class="px-5 py-3 hover:bg-gray-200" href="#">Contact Us</a>
                    <a class="px-5 py-3 hover:bg-gray-200" href="#">Privacy Policy</a>
                </div>
                <a href="{{ route('contacts') }}"
                    class="px-3 py-6 font-medium hover:bg-black/10 mx-2 {{ Route::is('contacts') ? 'text-theme font-bold bg-black/20' : '' }}">Contacts</a>
                <a href="{{ route('login') }}"
                    class="px-3 py-4 rounded-lg font-medium hover:bg-black hover:text-white mx-2 border-2 border-black">Log
                    In</a>
            </div>
        </div>
    </div>
</div>