@if (isset($platos))
    @if (isset($mensaje_enviado) && $mensaje_enviado == 'fallo')
        <div id="mensaje_interno"
            class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 md:mx-4"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-bold">Ha ocurrido un error.</span>Intentelo de nuevo mas tarde o utilice otro medio de
                contacto.
            </div>
        </div>
    @endif
    @if (isset($mensaje_enviado) && $mensaje_enviado == 'exito')
        <div id="mensaje_interno"
            class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 md:mx-4"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-bold">Gracias por ponerse en contacto con nosotros.</span>En breve se pondra en
                contacto
                con usted una nutricionista.
            </div>
        </div>
    @endif
    <section class="relative dark:text-white text-dark">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <form action="{{ route('mensaje_interno') }}" method="post" class="md:mx-4">
                @csrf
                <div class="flex flex-col justify-center">
                    <label for="mensaje" class="block mb-2 text-sm">Mensaje</label>
                    <textarea name="mensaje" rows="6"
                        class="bg-gray-50 border text-sm rounded-lg
                    w-full p-2.5 resize-none dark:bg-gray-700"
                        placeholder="Escriba su mensaje"></textarea>
                </div>
                <input type="hidden" name="id_cliente" value="<?php echo $platos['id_cliente']; ?>">
                <button type="submit"
                    class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
            bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4">Enviar</button>
            </form>
        </div>
    </section>
    @if (isset($mensaje_enviado))
        {
        <script>
            document.getElementById("mensaje_interno").scrollIntoView();
        </script>
        }
    @endif
@endif
