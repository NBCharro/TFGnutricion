@extends ('layouts.main-layout')
@section('page-title', 'Ha ocurrido un error')
@section('content-area')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-500 dark:text-tertiary-100">
                    Error</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">
                    Ha ocurrido un problema
                </p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                    En este momento no podemos atender su solicitud, por favor intentelo más tarde o pongase en contacto con
                    nosotros a traves de otro medio.
                </p>
                <a href="{{ route('inicio') }}"
                    class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
bg-primary-500 text-white
hover:bg-tertiary-100 hover:text-black
dark:bg-tertiary-100 dark:text-black
dark:hover:bg-primary-500 dark:hover:text-white">
                    Volver a inicio
                </a>
            </div>
        </div>
    </section>
@endsection
