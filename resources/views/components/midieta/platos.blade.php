<section class="flex flex-col items-center">
    <div class="block max-w-sm rounded-lg pt-6">
        <div class="relative mb-4">
            {{-- <label for="plato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
Elija una opcion
</label> --}}
            <select id="plato"
                class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800">
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
    <div class="container mx-auto px-6 pb-6 grid grid-cols-1 gap-4 md:grid-cols-2 text-white" id="mostrarPlatos">
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
                'platoAlimento flex justify-center items-center rounded-lg py-4 px-2 shadow-lg bg-primary-500 text-white dark:bg-gray-800 ring ring-tertiary-100 hover:ring-primary-50 hover:cursor-pointer';
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
            const nombrePlato = event.target.children[0] ? event.target.children[0].innerHTML : event.target
                .innerHTML;
            crearModalNutrientes(nombrePlato);
            modalNutrientes.classList.toggle("hidden");
        }
        if (
            event.target == modalNutrientes || event.target.id == 'puedeCerrarModalNutrientes') {
            modalNutrientes.classList.toggle("hidden");
        }
    })

    const tablaNutrientes = document.getElementById('tablaNutrientes')

    function crearBloquesModalHTML(key, value) {
        const nombreNutriente = document.createElement("p");
        const valorNutriente = document.createElement("p");
        nombreNutriente.className = 'rounded-lg bg-gray-800 border-gray-700 text-right px-4 text-white';
        valorNutriente.className = 'rounded-lg bg-gray-800 border-gray-700 px-4';
        nombreNutriente.textContent = key;
        valorNutriente.textContent = value;
        tablaNutrientes.appendChild(nombreNutriente);
        tablaNutrientes.appendChild(valorNutriente);
    }

    async function crearModalNutrientes(plato) {
        tablaNutrientes.textContent = '';
        const datoTratadoAPI = await datoNutrientesAPI(plato);
        for (const key in datoTratadoAPI) {
            crearBloquesModalHTML(key, datoTratadoAPI[key]);
        }
    }

    // Buscar en la API
    async function datoNutrientesAPI(plato) {
        //  const respuesta = await fetch(`https://api-nutricion.onrender.com/api/v1/alimentos/nombre=${plato}`)
        const respuesta = await fetch(`http://localhost:3000/api/v1/alimentos/nombre=${plato}`)
        const respuestaAPI = await respuesta.json();
        // Tratar Datos API
        const alimentoCapitalizado = respuestaAPI.alimento.charAt(0).toUpperCase() + respuestaAPI.alimento.slice(1);
        const datoTratado = {
            "Alimento": alimentoCapitalizado,
            "Poder alorifico (Kcal/Kg)": respuestaAPI.poderCalorifico,
            "Kilocalorias": respuestaAPI.kcal,
            "Agua": respuestaAPI.agua,
            "Carbohidratos (g)": respuestaAPI.carboHidratos,
            "Colesterol (mg)": respuestaAPI.colesterol,
            "Fibra (g)": respuestaAPI.fibra,
            "Proteina animal (g)": respuestaAPI.proteina.animal,
            "Proteina vegetal (g)": respuestaAPI.proteina.vegetal,
            "Grasa": respuestaAPI.lipidos.grasa,
            "Grasa saturada": respuestaAPI.lipidos.saturada,
            "Grasa monoinsaturada": respuestaAPI.lipidos.monoinsaturada,
            "Grasa poliinsaturada": respuestaAPI.lipidos.poliinsaturada,
            "Calcio (mg)": respuestaAPI.minerales.calcio,
            "Potasio (mg)": respuestaAPI.minerales.potasio,
            "Fosforo (mg)": respuestaAPI.minerales.fosforo,
            "Yodo (mg)": respuestaAPI.minerales.yodo,
            "Cobre (mg)": respuestaAPI.minerales.cobre,
            "Selenio (mg)": respuestaAPI.minerales.selenio,
            "Cloro (mg)": respuestaAPI.minerales.cloro,
            "Hierro (mg)": respuestaAPI.minerales.hierro,
            "Sodio (mg)": respuestaAPI.minerales.sodio,
            "Zinq (mg)": respuestaAPI.minerales.zinq,
            "Magnesio (mg)": respuestaAPI.minerales.magnesio,
            "Manganeso (mg)": respuestaAPI.minerales.manganeso,
            "Vitamina B1 (mg)": respuestaAPI.vitaminas.b1,
            "Vitamina B2 (mg)": respuestaAPI.vitaminas.b2,
            "Vitamina B3 (mg)": respuestaAPI.vitaminas.b3,
            "Vitamina B5 (mg)": respuestaAPI.vitaminas.b5,
            "Vitamina B6 (mg)": respuestaAPI.vitaminas.b6,
            "Vitamina B8 (mg)": respuestaAPI.vitaminas.b8,
            "Vitamina B9 (mg)": respuestaAPI.vitaminas.b9,
            "Vitamina B12 (mg)": respuestaAPI.vitaminas.b12,
            "Vitamina C (mg)": respuestaAPI.vitaminas.c,
            "Vitamina D (mg)": respuestaAPI.vitaminas.d,
            "Vitamina A (mg)": respuestaAPI.vitaminas.a,
            "Vitamina E (mg)": respuestaAPI.vitaminas.e
        };
        // Eliminamos los null
        for (const key in datoTratado) {
            if (datoTratado[key] == null) {
                delete datoTratado[key];
            }
        }
        return datoTratado;
    }
</script>
