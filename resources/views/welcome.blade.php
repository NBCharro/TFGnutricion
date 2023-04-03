@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section
        class="flex flex-col items-center bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="block max-w-sm rounded-lg p-6">
            <div class="relative mb-4">
                <label for="plato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Elija una opcion
                </label>
                <select id="plato"
                    class="border text-m rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 bg-gray-700 border-gray-600 placeholder-gray-400 text-white">
                    <option>Desayuno</option>
                    <option value="mediamanana">Media mañana</option>
                    <option>Comida</option>
                    <option>Merienda</option>
                    <option>Cena</option>
                    <option>Recena</option>
                    <option>Otro</option>
                </select>
            </div>
        </div>
        <div class="container mx-auto p-6 grid grid-cols-2 gap-4 text-white" id="mostrarPlatos">
        </div>
    </section>
    {{-- MODAL --}}
    <div id="modalNutrientes"
        class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="flex justify-center" id="puedeCerrarModalNutrientes">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <div class="relative rounded-lg shadow bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                        <h3 class="text-xl font-semibold text-white">
                            Nutrientes
                        </h3>
                        <button id="puedeCerrarModalNutrientes"
                            class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white">
                            <svg id="puedeCerrarModalNutrientes" aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path id="puedeCerrarModalNutrientes" fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div id="tablaNutrientes" class="w-full text-sm text-left text-gray-400 grid grid-cols-2 gap-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN MODAL --}}
    <script>
        platosPHP = @js($platos);
        const plato = document.getElementById('plato')
        const mostrarPlatos = document.getElementById('mostrarPlatos')

        plato.addEventListener('change', (event) => {
            event.preventDefault;
            mostrarPlatosHora();
        })

        mostrarPlatosHora();

        function mostrarPlatosHora() {
            opcion = document.getElementById('plato').value.toLowerCase()
            // Borrar contenido anterior
            mostrarPlatos.textContent = "";
            // Array para mostrar los platos
            eval(`platosPHP['${opcion}']`).forEach(plato => {
                // Crear elemento nuevo
                const divPrincipal = document.createElement("div");
                const parrafo = document.createElement("p");
                divPrincipal.className =
                    'platoAlimento flex justify-center items-center rounded-lg py-12 px-6 shadow-lg border-gray-600 bg-gray-900 ring ring-tertiary-100 hover:ring-primary-50 hover:cursor-pointer';
                parrafo.className = 'platoAlimento text-md text-justify';
                parrafo.textContent = plato
                // Agregar el elemento nuevo al DOM
                divPrincipal.appendChild(parrafo);
                mostrarPlatos.appendChild(divPrincipal);
            });
        }

        // MODAL
        const modalNutrientes = document.getElementById('modalNutrientes')

        document.addEventListener('click', (event) => {
            event.preventDefault;
            if (event.target.classList.contains('platoAlimento')) {
                modalNutrientes.classList.toggle("hidden");
                // llamadaAPI();
                recorrerDatosApi();
            }
            if (
                event.target == modalNutrientes || event.target.id == 'puedeCerrarModalNutrientes') {
                modalNutrientes.classList.toggle("hidden");
            }
        })

        const tablaNutrientes = document.getElementById('tablaNutrientes')

        function crearTablaNutrientes(key, value) {
            const nombreNutriente = document.createElement("p");
            const valorNutriente = document.createElement("p");
            nombreNutriente.className = 'rounded-lg bg-gray-800 border-gray-700 text-right px-4 text-white';
            valorNutriente.className = 'rounded-lg bg-gray-800 border-gray-700 px-4';
            nombreNutriente.textContent = key;
            valorNutriente.textContent = value;
            tablaNutrientes.appendChild(nombreNutriente);
            tablaNutrientes.appendChild(valorNutriente);
        }

        function recorrerDatosApi() {
            tablaNutrientes.textContent = '';
            for (const key in datoTratadoAPI) {
                crearTablaNutrientes(key, datoTratadoAPI[key]);
            }
        }

        // PRUEBAS
        // Buscar en la API. Arreglar
        async function llamadaAPI() {
            let respuesta = await fetch(`http://localhost:3000/api/v1/alimentos`)
            let json = await respuesta.json();
            console.log(json);
        }
        const datoTratadoAPI = {
            "Alimento": "Huevo codorniz",
            "Poder alorifico": 90,
            "Kilocalorias": 154,
            "Agua": 74,
            "Carbohidratos": 0.41,
            "Colesterol": 844,
            "Fibra": 0,
            "Proteina animal": 13.05,
            "Proteina vegetal": 0,
            "Grasa": 11.09,
            "Grasa saturada": 3.56,
            "Grasa monoinsaturada": 4.32,
            "Grasa poliinsaturada": 1.32,
            "Calcio": 64,
            "Potasio": 132,
            "Fosforo": 226,
            "Cobre": 0.06,
            "Selenio": 32,
            "Hierro": 3.65,
            "Sodio": 141,
            "Zinq": 1.47,
            "Magnesio": 13,
            "Manganeso": 0.04,
            "Vitamina B1": 0.13,
            "Vitamina B2": 0.79,
            "Vitamina B3": 0.15,
            "Vitamina B5": 1.76,
            "Vitamina B6": 0.15,
            "Vitamina B9": 66,
            "Vitamina B12": 1.58,
            "Vitamina C": 0,
            "Vitamina A": 90,
            "Vitamina E": 0.74
        };
    </script>
@endsection
