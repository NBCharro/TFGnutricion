@php
    $perdida_peso_1 = 0;
    $semanas_perdida_peso_1 = 0;
    $perdida_peso_2 = 0;
    $semanas_perdida_peso_2 = 0;
    $perdida_peso_final = 0;
    if (isset($perdida_peso_cliente_seleccionado) && count($perdida_peso_cliente_seleccionado)) {
        $perdida_peso_1 = $perdida_peso_cliente_seleccionado['perdida_peso_1'];
        $semanas_perdida_peso_1 = $perdida_peso_cliente_seleccionado['semanas_perdida_peso_1'];
        $perdida_peso_2 = $perdida_peso_cliente_seleccionado['perdida_peso_2'];
        $semanas_perdida_peso_2 = $perdida_peso_cliente_seleccionado['semanas_perdida_peso_2'];
        $perdida_peso_final = $perdida_peso_cliente_seleccionado['perdida_peso_final'];
    }
@endphp
<div id="perdida_peso" class="grid md:grid-cols-5 md:gap-2 bg-tertiary-500 md:p-2 rounded-xl">
    <div class="relative z-0 w-full mb-2 group">
        <label for="perdida_peso_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Perdida de peso inicial (g)
        </label>
        <input type="number" name="perdida_peso_1" id="perdida_peso_1" required min="0" value="<?php echo $perdida_peso_1; ?>"
            step="0.5"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    </div>
    <div class="relative z-0 w-full mb-2 group">
        <label for="semanas_perdida_peso_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Semanas
        </label>
        <input type="number" name="semanas_perdida_peso_1" id="semanas_perdida_peso_1" required min="0"
            value="<?php echo $semanas_perdida_peso_1; ?>"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    </div>
    <div class="relative z-0 w-full mb-2 group">
        <label for="perdida_peso_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Perdida de peso despues (g)
        </label>
        <input type="number" name="perdida_peso_2" id="perdida_peso_2" required min="0"
            value="<?php echo $perdida_peso_2; ?>" step="0.5"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    </div>
    <div class="relative z-0 w-full mb-2 group">
        <label for="semanas_perdida_peso_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Semanas
        </label>
        <input type="number" name="semanas_perdida_peso_2" id="semanas_perdida_peso_2" required min="0"
            value="<?php echo $semanas_perdida_peso_2; ?>"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    </div>
    <div class="relative z-0 w-full mb-2 group">
        <label for="perdida_peso_final" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Perdida de peso al final (g)
        </label>
        <input type="number" name="perdida_peso_final" id="perdida_peso_final" required min="0"
            value="<?php echo $perdida_peso_final; ?>" step="0.5"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    </div>
</div>
