@php
    if ($mensaje_mostrado['mensaje_interno_externo'] == 'interno') {
        $nombre = $mensaje_mostrado['nombre'];
        $info_extra = $mensaje_mostrado['id_cliente'];
        $fecha = $mensaje_mostrado['fecha'];
        $mensaje = $mensaje_mostrado['mensaje'];
        $texto_id_mensaje = "interno_{$mensaje_mostrado['id']}";
    }
    if ($mensaje_mostrado['mensaje_interno_externo'] == 'externo') {
        $nombre = $mensaje_mostrado['nombre'];
        $info_extra = $mensaje_mostrado['telefono'] . ' | ' . $mensaje_mostrado['email'];
        $fecha = $mensaje_mostrado['fecha'];
        $mensaje = $mensaje_mostrado['mensaje'];
        $texto_id_mensaje = "externo_{$mensaje_mostrado['id']}";
    }
@endphp
<section id="ampliarmensajes"
    class="shadow-lg md:shadow-none my-5 py-4 md:my-0 md:w-8/12 px-4 md:flex md:flex-col rounded-3xl md:rounded-none md:rounded-r-3xl bg-white dark:bg-gray-800">
    <form action="{{ route('mensajes') }}" method="post"
        class="flex justify-between items-center py-6 border-b-2 md:mb-8">
        @csrf
        <div class="flex space-x-4 items-center">
            <div class="flex flex-col">
                <h3 id="verMensajesNombre" class="font-semibold text-lg">
                    {{ $nombre }}
                </h3>
                <p id="verMensajesEmail" class="text-light dark:text-gray-400">
                    {{ $info_extra }}
                </p>
                <input id='id_mensaje' type="hidden" name="id_mensaje" value="{{ $texto_id_mensaje }}">
            </div>
        </div>
        <div>
            <ul id="iconos" class="flex text-gray-400 space-x-4">
                <button type="submit">
                    <li id="iconoBorrar" class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </li>
                </button>
            </ul>
        </div>
    </form>
    <section>
        <h1 id="verMensajesTitulo" class="font-bold text-2xl">
            {{ $fecha }}
        </h1>
        <article class="mt-8 dark:text-gray-400 leading-7 tracking-wider">
            <p id="verMensajesMensaje">
                {{ $mensaje }}
            </p>
        </article>
    </section>
</section>
