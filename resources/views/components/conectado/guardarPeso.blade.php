<form class="flex flex-col m-4">
    <div class="grid md:grid-cols-2 md:gap-3">
        <div class="relative z-0 w-full mb-2 group">
            <label for="fechaPeso" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Fecha
            </label>
            <input type="date" name="fechaPeso" id="fechaPeso"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                required>
        </div>
        <div class="relative z-0 w-full mb-1 group">
            <label for="peso" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Peso
            </label>
            <input type="number" name="peso" id="peso"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="60" required>
        </div>
    </div>
    <button type="submit"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center uppercase
            bg-primary text-white hover:bg-tertiary-100 hover:text-black">
        Guardar
    </button>
</form>
