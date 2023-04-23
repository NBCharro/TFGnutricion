{{-- <header class="fixed z-50 top-0 w-full"> --}}
<header>
    <nav
        class="border-gray-200 px-4 lg:px-6 py-2.5 bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="{{ route('inicio') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
            </a>
            <div class="flex items-center lg:order-2">
                <a href="{{ route('home') }}"
                    class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
            bg-tertiary-100 hover:text-white hover:bg-primary text-black">
                    Log in
                </a>
                <a href="#" id="botonModoNoche"
                    class="text-gray-800 dark:text-white hover:bg-gray-50 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-tertiary-100 dark:hover:text-black">
                    Modo noche
                </a>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100
                    ring ring-gray-500 dark:ring-tertiary-100 dark:text-tertiary-100"
                    aria-controls="mobile-menu-2" aria-expanded="false" id="botonNavBar">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="burgerNavBar">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('inicio') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('inicio') || Route::is('mensaje_externo') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('inicio') || Route::is('mensaje_externo') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent"
                            aria-current="page">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('midieta') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('midieta') || Route::is('mensaje_interno') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('midieta') || Route::is('mensaje_interno') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Mi dieta
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('comenzarmiplan') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('comenzarmiplan') || Route::is('guardar_respuestas_comenzarmiplan') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('comenzarmiplan') || Route::is('guardar_respuestas_comenzarmiplan') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Comenzar mi plan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clientes') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('clientes') || Route::is('guardar_peso') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('clientes') || Route::is('guardar_peso') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Clientes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dietas') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('dietas') || Route::is('modificar_cliente') || Route::is('nuevo_cliente') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('dietas') || Route::is('modificar_cliente') || Route::is('modificar_cliente') || Route::is('nuevo_cliente') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Dietas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mensajes') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('mensajes') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('mensajes') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Mensajes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
