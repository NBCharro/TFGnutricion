<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
    <title>@yield('page-title')</title>
</head>

<body>

    {{-- <body class="dark"> --}}
    <div class="bg-primary dark:bg-tertiary-700 flex flex-col h-screen">
        @include('components.header')
        <div class="flex-grow">
            @yield('content-area')
        </div>
        @include('components.footer')
    </div>
</body>

</html>
