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
    document.addEventListener('click', (event) => {
        event.preventDefault;
        if (event.target.classList.contains('platoAlimento')) {
            console.log(event.target);
        }
    })
</script>
