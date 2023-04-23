<section class="flex justify-center">
    <div class="mb-3 xl:w-96">
        <form action="{{ route('comenzarmiplan') }}" method="post"
            class="relative mb-4 flex w-full flex-wrap items-stretch">
            @csrf
            <input type="search"
                class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded md:rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal dark:placeholder:text-neutral-200 dark:text-white dark:bg-gray-800 "
                placeholder="Introduzca su codigo" name="id_cliente_buscado" />
            <button type='submit'
                class="relative z-[2] flex items-center rounded md:rounded-r my-2 md:my-0 px-6 py-2.5 text-xs font-medium uppercase leading-tight shadow-md hover:shadow-lg w-full sm:w-auto text-center
            bg-primary text-white hover:bg-tertiary-100 hover:text-black"
                id="botonCodigoCliente">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 mx-auto">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>
</section>
<section class="bg-white dark:bg-gray-900 flex justify-center">
    <div class="py-8 px-4 mx-auto text-center lg:py-16 lg:px-12 md:w-fit">
        <svg class="mx-auto mb-4 w-10 h-10 text-gray-400" width="24" height="24" viewBox="0 0 24 24"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H15.9595C16.5118 13 16.9595 12.5523 16.9595 12C16.9595 11.4477 16.5118 11 15.9595 11H8Z"
                fill="currentColor" />
            <path
                d="M8.04053 15.0665C7.48824 15.0665 7.04053 15.5142 7.04053 16.0665C7.04053 16.6188 7.48824 17.0665 8.04053 17.0665H16C16.5523 17.0665 17 16.6188 17 16.0665C17 15.5142 16.5523 15.0665 16 15.0665H8.04053Z"
                fill="currentColor" />
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5 3C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H5ZM7 5H5L5 19H19V5H17V6C17 7.65685 15.6569 9 14 9H10C8.34315 9 7 7.65685 7 6V5ZM9 5V6C9 6.55228 9.44772 7 10 7H14C14.5523 7 15 6.55228 15 6V5H9Z"
                fill="currentColor" />
        </svg>
        <h1
            class="mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-5xl xl:text-6xl dark:text-white">
            ¡Qué alegría tenerte aquí!
        </h1>
        <p class="font-bold text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
            Has dado el primer paso hacia una vida más saludable y estamos para ayudarte a conseguirlo.
        </p>
        <p class="font-light text-gray-500 md:text-lg xl:text-xl dark:text-gray-400 my-4">
            Las preguntas que encontrarás a continuación son solo una forma de empezar a conocerte mejor y saber qué
            tipo de alimentación se adapta mejor a ti. No te preocupes si no tienes todas las respuestas, lo importante
            es que estás aquí para aprender y mejorar tu bienestar.
        </p>
        <p class="font-bold text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
            ¡Estamos a tu lado en todo momento!
        </p>
    </div>
</section>
