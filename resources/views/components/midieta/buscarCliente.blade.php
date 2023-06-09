<section class="flex justify-center">
    <div class="mb-3 xl:w-96 flex justify-center">
        <form action="{{ route('midieta') }}" method="post" class="relative mb-4 flex w-full flex-wrap items-stretch">
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
