@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="container m-auto px-6 py-12 text-white md:px-12 xl:px-0">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Servicios</h2>
            </div>
            <div class="mx-auto grid gap-6 md:w-3/4 lg:w-full lg:grid-cols-4">
                <div
                    class="relative bg-[url('/public/images/inicio/personalizada.jpg')] bg-cover bg-center bg-no-repeat rounded-2xl shadow-xl px-8 sm:px-12 lg:px-8 flex items-end pt-40">
                    <div class="absolute inset-0 bg-tertiary-700/40"></div>
                    <div class="relative mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold">Dieta personalizada</h3>
                        <hr>
                        <p class="mb-6">Hago unas dietas de la hostia ajustadas a lo que te guste comer</p>
                    </div>
                </div>
                <div
                    class="relative bg-[url('/public/images/inicio/adaptada.jpg')] bg-cover bg-center bg-no-repeat rounded-2xl shadow-xl px-8 sm:px-12 lg:px-8 flex items-end pt-40">
                    <div class="absolute inset-0 bg-tertiary-700/40"></div>
                    <div class="relative mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold">Adaptada a patologías</h3>
                        <hr>
                        <p class="mb-6">¿Comes carne? Pues ración pequeña de carne o pescado a la plancha</p>
                    </div>
                </div>
                <div
                    class="relative bg-[url('/public/images/inicio/seguimiento.jpg')] bg-cover bg-center bg-no-repeat rounded-2xl shadow-xl px-8 sm:px-12 lg:px-8 flex items-end pt-40">
                    <div class="absolute inset-0 bg-tertiary-700/40"></div>
                    <div class="relative mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold">Seguimiento</h3>
                        <hr>
                        <p class="mb-6">Cada dos semanas te contacto y revisamos que tal lo llevas</p>
                    </div>
                </div>
                <div
                    class="relative bg-[url('/public/images/inicio/sinPastillas.jpg')] bg-cover bg-center bg-no-repeat rounded-2xl shadow-xl px-8 sm:px-12 lg:px-8 flex items-end pt-40">
                    <div class="absolute inset-0 bg-tertiary-700/40"></div>
                    <div class="relative mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold">Sin pastillas milagros</h3>
                        <hr>
                        <p class="mb-6">En esta casa seguimos las leyes de la termodinámica</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
