@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900 md:w-screen">
        <div class="py-8 px-4 mx-auto text-center lg:py-16 lg:px-12 md:w-fit">
            <svg class="mx-auto mb-4 w-10 h-10 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <h1
                class="mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-5xl xl:text-6xl dark:text-white">
                Conexión exitosa
            </h1>
            <p class="font-bold text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                Acabas de conectarte oficialmente a nuestra plataforma.
            </p>
            <p class="font-light text-gray-500 md:text-lg xl:text-xl dark:text-gray-400 my-2">
                Si tienes alguna duda o necesitas ayuda en cualquier momento, nuestro equipo de soporte está disponible para
                ayudarte.
            </p>
            <p class="font-semibold text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                Te deseamos un gran día de trabajo.
            </p>
        </div>
    </section>
@endsection
