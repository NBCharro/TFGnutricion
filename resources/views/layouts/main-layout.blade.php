<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
    @vite('resources/css/app.css')
    <title>@yield('page-title')</title>
    {{-- <script src="{{ asset('js/@yield('page-js')') }}" defer></script> --}}
</head>

<body>

    {{-- <body class="dark"> --}}
    <div
        class="md:flex md:flex-col justify-between h-screen bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        @include('components.header')
        @yield('content-area')
        @include('components.footer')
    </div>
</body>
<script>
    botonModoNoche = document.getElementById("botonModoNoche")
    botonModoNoche.addEventListener("click", function(event) {
        event.preventDefault();
        document.body.classList.toggle("dark");
    });
    botonNavBar = document.getElementById("botonNavBar")
    burgerNavBar = document.getElementById("burgerNavBar")
    botonNavBar.addEventListener("click", function(event) {
        event.preventDefault();
        burgerNavBar.classList.toggle("hidden");
    });
</script>

</html>
