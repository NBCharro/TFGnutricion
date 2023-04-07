@extends ('layouts.main-layout')
@section('page-title', 'Comenzar mi plan')
@section('content-area')
    @if (isset($mensaje) && $mensaje == 'No existe')
        <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 md:mx-4"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-bold">El codigo introducido no es correcto</span> intentelo de nuevo o contacte con
                nuestros nutricionistas para arreglarlo.
            </div>
        </div>
    @endif
    <section class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <form action="{{ route('comenzarmiplan') }}" method="post"
                class="relative mb-4 flex w-full flex-wrap items-stretch">
                @csrf
                <input type="search"
                    class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal dark:placeholder:text-neutral-200 dark:text-white dark:bg-gray-800 "
                    placeholder="Introduzca su codigo" name="id_cliente_buscado" />
                <button type='submit'
                    class="relative z-[2] flex items-center rounded-r px-6 py-2.5 text-xs font-medium uppercase leading-tight shadow-md hover:shadow-lg w-full sm:w-auto text-center
            bg-primary text-white hover:bg-tertiary-100 hover:text-black"
                    id="botonCodigoCliente">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </section>
    @if (isset($preguntas_clientes))
        <section class="m-4 md:mx-8 text-gray-900 dark:text-white">
            <form>
                <div class="grid grid-cols-2 gap-3">
                    @php
                        foreach ($preguntas_clientes as $numero_pregunta => $pregunta) {
                            echo "<label for='$numero_pregunta' class='block mb-1 text-sm font-medium text-right'>";
                            echo "$pregunta";
                            echo '</label>';
                            echo "<input type='text' id='$numero_pregunta' class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white' placeholder='Responda aqui' required>";
                        }
                    @endphp
                </div>
                <button type="submit"
                    class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
            bg-tertiary-100 hover:text-white hover:bg-primary text-black">Enviar</button>
            </form>
        </section>
    @endif
@endsection
