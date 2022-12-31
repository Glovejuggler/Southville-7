<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southville 7</title>
    <!-- Fonts -->
    {{--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="{{ mix('js/manifest.js') }}" defer></script> --}}
    {{-- <script src="{{ mix('js/vendor.js') }}" defer></script> --}}
</head>

<body class="font-sans antialiased min-h-screen bg-white flex flex-col">
    @include('layouts.partials.nav')

    <div class="mt-[68px]">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    <script>
        let navToggle = false;
        function toggleNav() {
            navToggle = !navToggle;
            if (navToggle === true) {
                document.getElementById('mobileNav').classList.remove('hidden');
                document.getElementById('mobileNav').classList.add('flex');
                document.getElementById('toggle').classList.add('bg-theme-800');
                document.getElementById('toggle').classList.add('text-white');
                document.body.style.overflow = 'hidden';
                document.body.style.height = '100vh';
            } else {
                document.getElementById('mobileNav').classList.remove('flex');
                document.getElementById('mobileNav').classList.add('hidden');
                document.getElementById('toggle').classList.remove('bg-theme-800','text-white');
                document.getElementById('toggle').classList.add('text-theme-800');
                document.body.style.overflow = 'auto';
                document.body.style.height = 'auto';
            }
        }
    </script>
</body>

</html>