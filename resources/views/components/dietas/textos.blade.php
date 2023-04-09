@php
    $index_textos = 1;
@endphp
<div id="textos"
    class="md:p-2 md:my-5 border-gray-100 bg-quaternary-200 text-gray-900 dark:text-white
                    dark:border-gray-600 dark:bg-gray-800 rounded-lg">
    <div id="mostrar_texto"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer mb-3">
        Mostrar textos</div>
    <div id="texto_general" class="hidden md:grid-cols-5 md:gap-4">
        <label for="texto_general_titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-right">
            Titulo
        </label>
        <input type="text" name="texto_general_titulo"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-4"
            value="Dieta de 1350 Kcal aprox.">
        <label for="texto_general_parrafo_1"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-right">
            Parrafo 1
        </label>
        <textarea cols="30" rows="4" name="texto_general_parrafo_1"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-4 resize-none">Calculada para tener una pérdida de alrededor de 600 - 700 g a la semana al principio, después irá bajando a 400 - 500 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades.
                    </textarea>
        <label for="texto_general_parrafo_2"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-right">
            Parrafo 2
        </label>
        <textarea cols="30" rows="4" name="texto_general_parrafo_2"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-4 resize-none">Para el aceite, la dosis media recomendada suele ser 100 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc.
                    </textarea>
    </div>
    <div id="texto_particular" class="hidden md:grid-cols-4 md:gap-4 md:my-5">
        @if (count($textos_cliente_seleccionado) > 1)
            @foreach ($textos_cliente_seleccionado as $key => $item)
                @if ($key != 'titulo' && $key != 'parrafo1' && $key != 'parrafo2')
                    <input type="text" name="texto_particular_alimento_<?php echo "$index_textos"; ?>"
                        value="<?php echo "$key"; ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="Escriba el alimento">
                    <input type="text" name="texto_particular_descripcion_<?php echo "$index_textos"; ?>"
                        value="<?php echo "$item"; ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-3"
                        placeholder="Escriba la descripcion">
                    @php
                        $index_textos++;
                    @endphp
                @endif
            @endforeach
        @else
            <input type="text" name="texto_particular_alimento_1"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Escriba el alimento">
            <input type="text" name="texto_particular_descripcion_1"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-3"
                placeholder="Escriba la descripcion">
        @endif
        <div id="crearMas_texto_particular"
            class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer">
            Crear mas</div>
    </div>

</div>
<script>
    let numero_campos_texto_particular = @json($index_textos);
</script>
<script src="{{ asset('js/dietas/textos.js') }}" defer></script>
