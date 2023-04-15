<section id="listaMensajes"
    class="md:flex md:flex-col py-3 md:w-4/12 overflow-y-scroll md:rounded-l-3xl md:rounded-none rounded-3xl bg-white dark:bg-gray-800 shadow-lg md:shadow-none">
    <ul id="listaMensajes">
        @if (isset($mensajes_internos))
            @foreach ($mensajes_internos as $mensaje_interno)
                @php
                    $mensaje_interno_seleccionado = '';
                    if ($mensaje_mostrado['mensaje_interno_externo'] == 'interno' && $mensaje_interno['id'] == $mensaje_mostrado['id']) {
                        $mensaje_interno_seleccionado = 'bg-tertiary-500';
                    }
                @endphp
                <li id='interno_{{ $mensaje_interno['id'] }}'
                    class='{{ $mensaje_interno_seleccionado }} my-1 py-5 border-b px-3 transition hover:bg-tertiary-500 cursor-pointer'>
                    <div class='flex justify-between items-center'>
                        <h3 class='text-lg font-semibold'>
                            @if ($mensaje_interno['leido'] == 1)
                                <svg class="w-6 h-6 inline dark:text-tertiary-100" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            @endif
                            <svg class='w-6 h-6 inline dark:text-tertiary-100' fill='none' stroke='currentColor'
                                viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
                                <path clip-rule='evenodd'
                                    d='M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z'
                                    fill-rule='evenodd'></path>
                            </svg>
                            {{ $mensaje_interno['nombre'] }}
                        </h3>
                        <p class='text-md text-gray-400'>{{ $mensaje_interno['fecha'] }}</p>
                    </div>
                    <div class='text-md italic text-gray-400'>{{ substr($mensaje_interno['mensaje'], 0, 25) }}</div>
                </li>
            @endforeach
        @endif

        @if (isset($mensajes_externos))
            @foreach ($mensajes_externos as $mensaje_externo)
                @php
                    $mensaje_externo_seleccionado = '';
                    if ($mensaje_mostrado['mensaje_interno_externo'] == 'externo' && $mensaje_externo['id'] == $mensaje_mostrado['id']) {
                        $mensaje_externo_seleccionado = 'bg-tertiary-500';
                    }
                @endphp
                <li id='externo_{{ $mensaje_externo['id'] }}'
                    class='{{ $mensaje_externo_seleccionado }} my-1 py-5 border-b px-3 transition hover:bg-tertiary-500  cursor-pointer'>
                    <div class='flex justify-between items-center'>
                        <h3 class='text-lg font-semibold'>
                            @if ($mensaje_externo['leido'] == 1)
                                <svg class="w-6 h-6 inline dark:text-tertiary-100" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            @endif
                            {{ $mensaje_externo['nombre'] }}
                        </h3>
                        <p class='text-md text-gray-400'>{{ $mensaje_externo['fecha'] }}</p>
                    </div>
                    <div class='text-md italic text-gray-400'>{{ substr($mensaje_externo['mensaje'], 0, 25) }}</div>
                </li>
            @endforeach
        @endif
    </ul>
</section>
