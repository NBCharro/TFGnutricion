@php
    @dump($platos);
@endphp
@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="flex flex-col justify-center">
        <div class="block max-w-sm rounded-lg p-6">
            <div class="relative mb-4">
                <label for="plato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Elije una opcion
                </label>
                <select id="plato"
                    class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white">
                    <option>Desayuno</option>
                    <option value="mediamanana">Media mañana</option>
                    <option>Comida</option>
                    <option>Merienda</option>
                    <option>Cena</option>
                    <option>Recena</option>
                    <option>Otro</option>
                </select>
            </div>
            <button id="botonPlato"
                class="rounded bg-primary px-6 py-2.5 leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg">
                Mostrar
            </button>
        </div>
        <div class="grid grid-cols-2" id="mostrarPlatos">
            <div class="flex justify-center">
                <div class="block max-w-sm rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Some quick example text to build on the card title and make up the
                        bulk of the card's content.
                    </p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="block max-w-sm rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Some quick example text to build on the card title and make up the
                        bulk of the card's content.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script>
        platosPHP = @js($platos);
        botonPlato = document.getElementById('botonPlato')
        mostrarPlatos = document.getElementById('mostrarPlatos')
        botonPlato.addEventListener('click', (event) => {
            event.preventDefault;
            opcion = document.getElementById('plato').value.toLowerCase()
            // Borrar contenido anterior
            mostrarPlatos.textContent = "";
            // Array para mostrar los platos
            eval(`platosPHP['${opcion}']`).forEach(plato => {
                // Crear elemento nuevo
                const divPrincipal = document.createElement("div");
                const divSecundario = document.createElement("div");
                const parrafo = document.createElement("p");
                divPrincipal.className = 'flex justify-center';
                divSecundario.className =
                    'block max-w-sm rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700';
                parrafo.className = 'mb-4 text-base text-neutral-600 dark:text-neutral-200';
                parrafo.textContent = plato
                // Agregar el elemento nuevo al DOM
                divSecundario.appendChild(parrafo);
                divPrincipal.appendChild(divSecundario);
                mostrarPlatos.appendChild(divPrincipal);
            });


        })
    </script>
@endsection
