@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="m-4 md:mx-8 text-gray-900 dark:text-white">
        <form>
            <div class="mb-2">
                <label for="pregunta_1" class="block mb-1 text-sm font-medium">
                    Pregunta 1
                </label>
                <input type="text" id="pregunta_1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Responda aqui" required>
            </div>
            <div class="mb-2">
                <label for="pregunta_2" class="block mb-1 text-sm font-medium">
                    Pregunta 2
                </label>
                <input type="text" id="pregunta_2"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Responda aqui" required>
            </div>
            <div class="md:flex md:items-center mb-2">
                <label for="pregunta_3" class="w-auto md:text-right md:px-5 block text-sm font-medium">
                    Pregunta 3
                </label>
                <input type="text" id="pregunta_3"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Responda aqui" required>
            </div>
            <div class="md:flex md:items-center mb-4">
                <label for="codigo_cliente" class="md:text-right md:px-5 block mb-1 text-sm font-medium">
                    Codigo
                </label>
                <input type="text" id="codigo_cliente"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="ab1234" required>
            </div>
            <button type="submit"
                class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
            bg-tertiary-100 hover:text-white hover:bg-primary text-black">Enviar</button>
        </form>
    </section>
@endsection
