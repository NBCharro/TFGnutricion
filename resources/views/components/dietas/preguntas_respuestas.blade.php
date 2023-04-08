<div id="seccion_preguntas_respuestas" class="bg-quaternary-200 md:p-2 rounded-xl md:my-5">
    <div id="mostrar_preguntas_respuestas"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer mb-3">
        Mostrar preguntas y respuestas</div>
    {{-- <div id="preguntas_respuestas" class="hidden md:grid-cols-2 md:gap-4"> --}}
    <div id="preguntas_respuestas" class="hidden">
        @if (count($preguntas_respuestas_cliente_seleccionado) > 1)
            @foreach ($preguntas_respuestas_cliente_seleccionado as $pregunta => $respuesta)
                @if ($pregunta != 'titulo' && $pregunta != 'parrafo1' && $pregunta != 'parrafo2')
                    <p class="w-screen"><?php echo "$pregunta"; ?></p>
                    <p class="w-screen"><?php echo "$respuesta"; ?></p>
                @endif
            @endforeach
        @endif
    </div>
</div>
<script></script>
