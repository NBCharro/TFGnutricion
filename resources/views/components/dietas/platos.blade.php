@php
    $index_platos = 1;
    $tipo_cliente = 'sin dieta';
    
    if (count($platos_cliente_seleccionado['desayuno']) >= 1 || count($platos_cliente_seleccionado['mediamanana']) >= 1 || count($platos_cliente_seleccionado['comida']) >= 1 || count($platos_cliente_seleccionado['merienda']) >= 1 || count($platos_cliente_seleccionado['cena']) >= 1 || count($platos_cliente_seleccionado['recena']) >= 1 || count($platos_cliente_seleccionado['otro']) >= 1) {
        $tipo_cliente = 'con dieta';
    }
@endphp
<div id="platos" class="bg-tertiary-500 md:p-2 rounded-xl md:my-5">
    <div id="mostrar_platos"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer mb-3">
        Mostrar platos</div>
    <div id="lista_platos" class="hidden md:grid-cols-5 md:gap-4">
        @if ($tipo_cliente == 'con dieta')
            @foreach ($platos_cliente_seleccionado as $key => $item)
                @if ($key != 'id_cliente')
                    @foreach ($item as $plato)
                        {{-- El autocomplete="off" es porque en Firefox sin ponerlo no selecciona la opcion marcada con selected --}}
                        <select name="select_plato_<?php echo "$index_platos"; ?>"
                            class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800"
                            autocomplete="off">
                            <option @php if($key == 'desayuno'){echo "selected";} @endphp>Desayuno</option>
                            <option @php if($key == 'mediamanana'){echo "selected";} @endphp>Media mañana</option>
                            <option @php if($key == 'comida'){echo "selected";} @endphp>Comida</option>
                            <option @php if($key == 'merienda'){echo "selected";} @endphp>Merienda</option>
                            <option @php if($key == 'cena'){echo "selected";} @endphp>Cena</option>
                            <option @php if($key == 'recena'){echo "selected";} @endphp>Recena</option>
                            <option @php if($key == 'otro'){echo "selected";} @endphp>Otro</option>
                        </select>
                        <input type="text" name="input_plato_<?php echo "$index_platos"; ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-4"
                            placeholder="Introduzca el plato" value="<?php echo "$plato"; ?>">
                        @php
                            $index_platos++;
                        @endphp
                    @endforeach
                @endif
            @endforeach
        @else
            <select name="select_plato_1"
                class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800">
                <option>Desayuno</option>
                <option>Media mañana</option>
                <option>Comida</option>
                <option>Merienda</option>
                <option>Cena</option>
                <option>Recena</option>
                <option>Otro</option>
            </select>
            <input type="text" name="input_plato_1"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white col-span-4"
                placeholder="Introduzca el plato">
        @endif
        <div id="crearMasPlatos"
            class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer">
            Crear mas</div>
    </div>
</div>
<script>
    let numero_campos_platos = @json($index_platos);
</script>
<script src="{{ asset('js/dietas/platos.js') }}" defer></script>
