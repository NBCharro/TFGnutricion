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
