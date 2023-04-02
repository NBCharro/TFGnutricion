@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="relative bg-[url('/public/images/inicio/formulario.jpg')] bg-cover bg-center bg-no-repeat bg-fixed">
        <div
            class="absolute inset-0
        bg-transparent bg-gradient-to-r from-primary-700/80 to-primary-900/60
        dark:bg-tertiary-700/5 dark:from-tertiary-700 dark:to-tertiary-700/5">
        </div>
        <div class="relative py-8 lg:py-16 px-4 mx-auto max-w-screen-md text-white"">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center">Contacto</h2>
            {{-- <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical
                issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p> --}}
            <form action="#" class="space-y-8">
                <div>
                    <label for="nombre" class="block mb-2 text-sm">Nombre</label>
                    <input type="text" id="nombre"
                        class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                         w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Escriba su nombre" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm">Teléfono</label>
                    <input type="tel" id="telefono"
                        class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                         w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Escriba su teléfono" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm">Email</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                         w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Escriba su email" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm">Mensaje</label>
                    <textarea id="message" rows="6"
                        class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                         w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Escriba su mensaje"></textarea>
                </div>
                <button type="submit"
                    class="py-3 px-5 text-sm text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Enviar</button>
            </form>
        </div>
    </section>
@endsection
