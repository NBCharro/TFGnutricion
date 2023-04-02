<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-tertiary-700">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="flex items-center lg:order-2">
                <a href="#"
                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-tertiary-100 dark:hover:text-black focus:outline-none dark:focus:ring-gray-800">Log
                    in</a>
                <a href="#"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    id="botonModoNoche">
                    Modo noche</a>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
                            {{ Route::is('inicio') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('inicio') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent"
                            aria-current="page">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('midieta') }}"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('midieta') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('midieta') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Mi dieta
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('comenzarMiPlan') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('comenzarMiPlan') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Comenzar mi plan
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('clientess') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('clientess') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Clientes
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 rounded lg:p-0
                            {{ Route::is('formularios') ? 'text-tertiary-700' : 'text-gray-400' }}
                            dark:{{ Route::is('formularios') ? 'text-white' : 'text-gray-400' }}
                            lg:bg-transparent">
                            Formularios
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
