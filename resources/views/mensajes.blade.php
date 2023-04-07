@extends ('layouts.main-layout')
@section('page-title', 'Mensajes')
@section('content-area')
    <main class="md:flex md:shadow-lg rounded-3xl text-black dark:text-white mx-6">
        <section id="listaMensajes"
            class="md:flex md:flex-col py-3 md:w-4/12 overflow-y-scroll md:rounded-l-3xl md:rounded-none rounded-3xl bg-white dark:bg-gray-800 shadow-lg md:shadow-none">
            <ul id="listaMensajes">
                @php
                    if (count($mensajes_internos) > 0) {
                        foreach ($mensajes_internos as $mensaje_interno) {
                            $seleccionInicial = $mensaje_interno['id'] == 1 ? 'bg-tertiary-500' : '';
                            echo "<li id='interno_{$mensaje_interno['id']}' class='{$seleccionInicial} my-1 py-5 border-b px-3 transition hover:bg-tertiary-500 cursor-pointer'>";
                            echo " <div class='flex justify-between items-center'>";
                            echo "<h3 class='text-lg font-semibold'>{$mensaje_interno['nombre']}</h3>";
                            echo "<p class='text-md text-gray-400'>{$mensaje_interno['fecha']}</p>";
                            echo '</div>';
                            echo "<div class='text-md italic text-gray-400'>" . substr($mensaje_interno['mensaje'], 0, 25) . '</div>';
                            echo '</li>';
                        }
                    }
                    if (count($mensajes_externos) > 0) {
                        foreach ($mensajes_externos as $mensaje_externo) {
                            if (count($mensajes_internos) == 0) {
                                $seleccionInicial = $mensaje_externo['id'] == 1 ? 'bg-tertiary-500' : '';
                            }
                            echo "<li id='externo_{$mensaje_externo['id']}' class='{$seleccionInicial} my-1 py-5 border-b px-3 transition hover:bg-tertiary-500  cursor-pointer'>";
                            echo " <div class='flex justify-between items-center'>";
                            echo "<h3 class='text-lg font-semibold'>{$mensaje_externo['nombre']}</h3>";
                            echo "<p class='text-md text-gray-400'>{$mensaje_externo['fecha']}</p>";
                            echo '</div>';
                            echo "<div class='text-md italic text-gray-400'>" . substr($mensaje_externo['mensaje'], 0, 25) . '</div>';
                            echo '</li>';
                        }
                    }
                @endphp
            </ul>
        </section>
        <section
            class="shadow-lg md:shadow-none my-5 py-4 md:my-0 md:w-8/12 px-4 md:flex md:flex-col rounded-3xl md:rounded-none md:rounded-r-3xl bg-white dark:bg-gray-800">
            <div class="flex justify-between items-center py-6 border-b-2 md:mb-8">
                <div class="flex space-x-4 items-center">
                    <div class="flex flex-col">
                        <h3 id="verMensajesNombre" class="font-semibold text-lg">
                            @php
                                if (count($mensajes_internos) > 0) {
                                    echo $mensajes_internos[0]['nombre'];
                                } elseif (count($mensajes_externos) > 0) {
                                    echo $mensajes_externos[0]['nombre'];
                                }
                            @endphp
                        </h3>
                        <p id="verMensajesEmail" class="text-light dark:text-gray-400">
                            @php
                                if (count($mensajes_internos) > 0) {
                                    echo $mensajes_internos[0]['id_cliente'];
                                } elseif (count($mensajes_externos) > 0) {
                                    echo $mensajes_externos[0]['email'];
                                }
                            @endphp
                        </p>
                    </div>
                </div>
                <div>
                    <ul id="iconos" class="flex text-gray-400 space-x-4">
                        <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                            </svg>
                        </li>
                        <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </li>

                        <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                        </li>
                        <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </li>
                        <li class="w-6 h-6 hover:text-tertiary-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <section>
                <h1 id="verMensajesTitulo" class="font-bold text-2xl">
                    @php
                        if (count($mensajes_internos) == 0 && count($mensajes_externos) == 0) {
                            echo 'No hay mensajes';
                        } else {
                            echo 'Titulo mensaje';
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
    </main>
    <script>
        const mensajes_internos = @js($mensajes_internos);
        const mensajes_externos = @js($mensajes_externos);
        const listaMensajes = document.getElementById('listaMensajes');
        const verMensajesNombre = document.getElementById('verMensajesNombre');
        const verMensajesEmail = document.getElementById('verMensajesEmail');
        const verMensajesTitulo = document.getElementById('verMensajesTitulo');
        const verMensajesMensaje = document.getElementById('verMensajesMensaje');

        listaMensajes.addEventListener('click', (event) => {
            const todosElementosLi = document.querySelectorAll("li");
            todosElementosLi.forEach(element => {
                element.classList.remove("bg-tertiary-500");
            });
            const li = event.target.closest("li");
            if (li) {
                const id = li.getAttribute("id").split('_');
                li.classList.toggle("bg-tertiary-500");
                if (id[0] == 'interno') {
                    mensajes_internos.forEach(element => {
                        if (element.id == id[1]) {
                            verMensajesNombre.innerHTML = '';
                            verMensajesEmail.innerHTML = '';
                            verMensajesTitulo.innerHTML = '';
                            verMensajesMensaje.innerHTML = '';
                            verMensajesNombre.innerHTML = element.nombre;
                            verMensajesEmail.innerHTML = element.id_cliente;
                            verMensajesTitulo.innerHTML = 'Titulo mensaje';
                            verMensajesMensaje.innerHTML = element.mensaje;
                        }
                    });
                } else {
                    mensajes_externos.forEach(element => {
                        if (element.id == id[1]) {
                            verMensajesNombre.innerHTML = '';
                            verMensajesEmail.innerHTML = '';
                            verMensajesTitulo.innerHTML = '';
                            verMensajesMensaje.innerHTML = '';
                            verMensajesNombre.innerHTML = element.nombre;
                            verMensajesEmail.innerHTML = element.email;
                            verMensajesTitulo.innerHTML = element.telefono;
                            verMensajesMensaje.innerHTML = element.mensaje;
                        }
                    });
                }
            }
        });
    </script>
@endsection