<div id="seccion_preguntas_respuestas"
    class="md:p-2 md:my-5 border-gray-100 bg-quaternary-200 text-gray-900 dark:text-white
                    dark:border-gray-600 dark:bg-gray-800 rounded-lg">
    <div id="mostrar_preguntas_respuestas"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer mb-3">
        Mostrar preguntas y respuestas</div>
    <div id="preguntas_respuestas" class="hidden relative px-4">
        @if (count($preguntas_respuestas_cliente_seleccionado) > 1)
            @foreach ($preguntas_respuestas_cliente_seleccionado as $pregunta => $respuesta)
                @if ($pregunta != 'titulo' && $pregunta != 'parrafo1' && $pregunta != 'parrafo2')
                    <hr class="h-px my-3 border-0 bg-gray-700">
                    <p class="w-fit text-lg font-semibold">
                        <?php echo "$pregunta"; ?>
                    </p>
                    <p class="w-fit mb-4 text-base font-normal text-gray-700 dark:text-gray-400">
                        <?php echo "$respuesta"; ?>
                    </p>
                @endif
            @endforeach
        @endif
    </div>
</div>
