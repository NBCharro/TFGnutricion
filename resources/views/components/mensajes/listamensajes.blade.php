<section id="listaMensajes"
    class="md:flex md:flex-col py-3 md:w-4/12 overflow-y-scroll md:rounded-l-3xl md:rounded-none rounded-3xl bg-white dark:bg-gray-800 shadow-lg md:shadow-none">
    <ul id="listaMensajes">
        @php
            if (count($mensajes_internos) > 0) {
                foreach ($mensajes_internos as $mensaje_interno) {
                    $leido = '';
                    if ($mensaje_interno['leido'] == 1) {
                        $leido = '<svg class="w-6 h-6 inline dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" fill-rule="evenodd"></path></svg>';
                    }
                    $seleccionInicial = $mensaje_interno['id'] == 1 ? 'bg-tertiary-500' : '';
                    echo "<li id='interno_{$mensaje_interno['id']}' class='{$seleccionInicial} my-1 py-5 border-b px-3 transition hover:bg-tertiary-500 cursor-pointer'>";
                    echo " <div class='flex justify-between items-center'>";
                    echo "<h3 class='text-lg font-semibold'>
                        {$leido}
                        <svg class='w-6 h-6 inline dark:text-white' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path clip-rule='evenodd' d='M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z' fill-rule='evenodd'></path></svg>
                        {$mensaje_interno['nombre']}
                        </h3>";
                    echo "<p class='text-md text-gray-400'>{$mensaje_interno['fecha']}</p>";
                    echo '</div>';
                    echo "<div class='text-md italic text-gray-400'>" . substr($mensaje_interno['mensaje'], 0, 25) . '</div>';
                    echo '</li>';
                }
            }
            if (count($mensajes_externos) > 0) {
                foreach ($mensajes_externos as $mensaje_externo) {
                    $leido = '';
                    if ($mensaje_externo['leido'] == 1) {
                        $leido = '<svg class="w-6 h-6 inline dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" fill-rule="evenodd"></path></svg>';
                    }
                    if (count($mensajes_internos) == 0) {
                        $seleccionInicial = $mensaje_externo['id'] == 1 ? 'bg-tertiary-500' : '';
                    }
                    echo "<li id='externo_{$mensaje_externo['id']}' class='{$seleccionInicial} my-1 py-5 border-b px-3 transition hover:bg-tertiary-500  cursor-pointer'>";
                    echo " <div class='flex justify-between items-center'>";
                    echo "<h3 class='text-lg font-semibold'>{$leido}{$mensaje_externo['nombre']}</h3>";
                    echo "<p class='text-md text-gray-400'>{$mensaje_externo['fecha']}</p>";
                    echo '</div>';
                    echo "<div class='text-md italic text-gray-400'>" . substr($mensaje_externo['mensaje'], 0, 25) . '</div>';
                    echo '</li>';
                }
            }
        @endphp
    </ul>
</section>
