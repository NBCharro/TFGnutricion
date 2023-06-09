<form action="{{ route('guardar_respuestas_comenzarmiplan') }}" method="post"
    class="m-4 md:mx-8 text-gray-900 dark:text-white">
    @csrf
    <div class="md:grid md:grid-cols-2 md:gap-3">
        @php
            $index = 0;
        @endphp
        @foreach ($preguntas_respuestas_clientes as $pregunta => $respuesta)
            @php
                $respuesta_anterior = '';
                if ($respuesta != 'respuesta_estandar' && $respuesta != 'respuesta') {
                    $respuesta_anterior = $respuesta;
                }
            @endphp
            <label for='respuesta_<?php echo $index; ?>' class='block mb-1 text-sm text-right my-4'>
                <?php echo $pregunta; ?>
            </label>
            <input type='text' name='respuesta_<?php echo $index; ?>'
                class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white'
                placeholder='Responda aqui' required value='<?php echo $respuesta_anterior; ?>'>
            <hr class="h-px my-3 border-0 bg-tertiary-100 dark:bg-primary-50 col-span-2">

            <input type="hidden" name="pregunta_<?php echo $index; ?>" value="<?php echo $pregunta; ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente->id_cliente_buscado; ?>">
            @php
                $index++;
            @endphp
        @endforeach
    </div>
    <button type="submit"
        class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
bg-primary-500 text-white
hover:bg-tertiary-100 hover:text-black
dark:bg-tertiary-100 dark:text-black
dark:hover:bg-primary-500 dark:hover:text-white">Enviar</button>
</form>
