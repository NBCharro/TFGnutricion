<div id="datos"
    class="md:p-2 md:my-2 border-gray-100 bg-quaternary-200 text-gray-900 dark:text-white
                    dark:border-gray-600 dark:bg-gray-800 rounded-lg">
    <div class="md:grid md:grid-cols-3 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="id_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Id Cliente
            </label>
            <input type="text" name="id_cliente" id="id_cliente" required
                value='{{ $cliente_seleccionado['id_cliente'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="nombre_apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nombre y apellidos
            </label>
            <input type="text" name="nombre_apellidos" id="nombre_apellidos" required
                value='{{ $cliente_seleccionado['nombre_apellidos'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Telefono
            </label>
            <input type="tel" name="telefono" id="telefono" value='{{ $cliente_seleccionado['telefono'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="md:grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-2 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email" id="email" value='{{ $cliente_seleccionado['email'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Direccion
            </label>
            <input type="text" name="direccion" id="direccion" value='{{ $cliente_seleccionado['direccion'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="md:grid md:grid-cols-4 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Fecha inicio
            </label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" required
                value='{{ date('Y-m-d', strtotime(str_replace('/', '-', $cliente_seleccionado['fecha_inicio']))) }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_inicial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso inicial (Kg)
            </label>
            <input type="number" name="peso_inicial" id="peso_inicial" required min="0" step="0.5"
                value='{{ $cliente_seleccionado['peso_inicial'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_final_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso final 1 (Kg)
            </label>
            <input type="number" name="peso_final_1" id="peso_final_1" required min="0" step="0.5"
                value='{{ $cliente_seleccionado['peso_final_1'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_final_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso final 2 (Kg)
            </label>
            <input type="number" name="peso_final_2" id="peso_final_2" min="0" step="0.5"
                value='{{ $cliente_seleccionado['peso_final_2'] }}'
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
</div>
