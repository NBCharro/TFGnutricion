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
