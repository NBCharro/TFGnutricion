<section id="ampliarmensajes"
    class="shadow-lg md:shadow-none my-5 py-4 md:my-0 md:w-8/12 px-4 md:flex md:flex-col rounded-3xl md:rounded-none md:rounded-r-3xl bg-white dark:bg-gray-800">
    <form action="{{ route('mensajes') }}" method="post"
        class="flex justify-between items-center py-6 border-b-2 md:mb-8">
        @csrf
        <div class="flex space-x-4 items-center">
            <div class="flex flex-col">
                @php
                    if (count($mensajes_internos) > 0) {
                        $texto_verMensajesNombre = $mensajes_internos[0]['nombre'];
                        $texto_verMensajesEmail = $mensajes_internos[0]['id_cliente'];
                        $texto_id_mensaje = "interno_{$mensajes_internos[0]['id']}";
                    } elseif (count($mensajes_externos) > 0) {
                        $texto_verMensajesNombre = $mensajes_externos[0]['nombre'];
                        $texto_verMensajesEmail = $mensajes_externos[0]['email'];
                        $texto_id_mensaje = "externo_{$mensajes_externos[0]['id']}";
                    }
                @endphp
                <h3 id="verMensajesNombre" class="font-semibold text-lg">
                    <?php echo $texto_verMensajesNombre; ?>
                </h3>
                <p id="verMensajesEmail" class="text-light dark:text-gray-400">
                    <?php echo $texto_verMensajesEmail; ?>
                </p>
                <input id='id_mensaje' type="hidden" name="id_mensaje" value="<?php echo $texto_id_mensaje; ?>">
            </div>
        </div>
        <div>
            <ul id="iconos" class="flex text-gray-400 space-x-4">
                <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                    </svg>
                </li>
                <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </li>
                <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </li>

                <button type="submit">
                    <li id="iconoBorrar" class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </li>
                </button>
                <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                </li>
            </ul>
        </div>
    </form>
    <section>
        <h1 id="verMensajesTitulo" class="font-bold text-2xl">
            @php
                if (count($mensajes_internos) > 0) {
                    echo 'Cliente';
                } else {
                    echo 'No cliente';
                }
            @endphp
        </h1>
        <article class="mt-8 dark:text-gray-400 leading-7 tracking-wider">
            <p id="verMensajesMensaje">
                @php
                    if (count($mensajes_internos) > 0) {
                        echo $mensajes_internos[0]['mensaje'];
                    } elseif (count($mensajes_externos) > 0) {
                        echo $mensajes_externos[0]['mensaje'];
                    }
                @endphp
            </p>
        </article>
    </section>
</section>
