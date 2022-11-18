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

    <div class="">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</body>

</html>