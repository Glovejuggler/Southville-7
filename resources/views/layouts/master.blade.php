<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southville 7 Credit Cooperative</title>
    <!-- Fonts -->
    {{--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="{{ mix('js/manifest.js') }}" defer></script> --}}
    {{-- <script src="{{ mix('js/vendor.js') }}" defer></script> --}}

    @yield('styles')
</head>

<body class="font-sans antialiased min-h-screen bg-white flex flex-col">
    @include('layouts.partials.nav')

    <div id="content" class="{{ Route::is('home') ? '' : 'mt-[68px]' }} overflow-x-hidden">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    <script>
        let navToggle = false;
        function toggleNav() {
            navToggle = !navToggle;
            if (navToggle === true) {
                document.getElementById('mobileNav').classList.remove('translate-x-full');
                document.getElementById('mobileNav').classList.add('flex');
                toggle.addEventListener('animationend', function() {
                    document.body.style.overflow = 'hidden';
                    document.body.style.height = '100vh';
                    document.body.classList.add('fixed')
                })
            } else {
                document.getElementById('mobileNav').classList.remove('flex');
                document.getElementById('mobileNav').classList.add('translate-x-full');
                toggle.addEventListener('animationend', function() {
                    document.body.style.overflow = 'auto';
                    document.body.style.height = 'auto';
                })
            }
        }

        window.addEventListener('scroll', function (e) {
            if (document.documentElement.scrollTop > 50) {
                document.querySelectorAll('.nav-link').forEach(element => {
                    element.classList.add('text-sm')
                });
                document.querySelector('#title').classList.remove('h-12','w-12')
                document.querySelector('#title').classList.add('h-10','w-10')
                document.querySelector('#login').classList.add('text-sm')
            } else {
                document.querySelectorAll('.nav-link').forEach(element => {
                    element.classList.remove('text-sm')
                });
                document.querySelector('#title').classList.add('h-12','w-12')
                document.querySelector('#title').classList.remove('h-10','w-10')
                document.querySelector('#login').classList.remove('text-sm')
            }
        })
    </script>

    @yield('scripts')
</body>

</html>