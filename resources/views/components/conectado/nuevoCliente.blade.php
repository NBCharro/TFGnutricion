<form class="flex flex-col m-4 w-full">
    <div class="grid md:grid-cols-3 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="id_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Id Cliente
            </label>
            <input type="text" name="id_cliente" id="id_cliente" required
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="nombre_apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nombre y apellidos
            </label>
            <input type="text" name="nombre_apellidos" id="nombre_apellidos" required
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Telefono
            </label>
            <input type="tel" name="telefono" id="telefono"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-2 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Direccion
            </label>
            <input type="text" name="direccion" id="direccion"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="grid md:grid-cols-4 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Fecha inicio
            </label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" required
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_inicial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso inicial
            </label>
            <input type="number" name="peso_inicial" id="peso_inicial" required min="0" value="0"
                step="0.5"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_final_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso final 1
            </label>
            <input type="number" name="peso_final_1" id="peso_final_1" required min="0" value="0"
                step="0.5"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_final_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso final 2
            </label>
            <input type="number" name="peso_final_2" id="peso_final_2" min="0" value="0" step="0.5"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="grid md:grid-cols-4 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="perdida_peso_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Perdida de peso inicial
            </label>
            <input type="number" name="perdida_peso_1" id="perdida_peso_1" required min="0" value="0"
                step="0.5"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="semanas_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Semanas
            </label>
            <input type="number" name="semanas_1" id="semanas_1" required min="0" value="0"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="perdida_peso_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Perdida de peso despues
            </label>
            <input type="number" name="perdida_peso_1" id="perdida_peso_1" required min="0" value="0"
                step="0.5"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="semanas_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Semanas
            </label>
            <input type="number" name="semanas_1" id="semanas_1" required min="0" value="0"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <button type="submit"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4">
        Guardar cliente nuevo
    </button>
</form>
