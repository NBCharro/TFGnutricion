@if (isset($preguntas_respuestas_clientes))
    <form action="{{ route('guardar_respuestas_comenzarmiplan') }}" method="post"
        class="m-4 md:mx-8 text-gray-900 dark:text-white">
        @csrf
        <div class="grid grid-cols-2 gap-3">
            @php
                $index = 0;
                foreach ($preguntas_respuestas_clientes as $pregunta => $respuesta) {
                    $respuesta_anterior = '';
                    if ($respuesta != 'respuesta_estandar' && $respuesta != 'respuesta') {
                        $respuesta_anterior = $respuesta;
                    }
                    echo "<label for='$pregunta' class='block mb-1 text-sm font-medium text-right'>";
                    echo "$pregunta";
                    echo '</label>';
                    echo "<input type='text' name='$pregunta' class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white' placeholder='Responda aqui' required value='$respuesta_anterior'>";
                    $index++;
                }
            @endphp
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente->id_cliente_buscado; ?>">
        </div>
        <button type="submit"
            class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
            bg-tertiary-100 hover:text-white hover:bg-primary text-black">Enviar</button>
    </form>
@endif
