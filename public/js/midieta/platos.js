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
    const platoMinusculas = plato.toLowerCase();
    //  const respuesta = await fetch(`https://api-nutricion.onrender.com/api/v1/alimentos/nombre=${plato}`)
    const respuesta = await fetch(`http://localhost:3000/api/v1/nombre=${platoMinusculas}`)
    const respuestaAPI = await respuesta.json();
    // Igual me devuelve varios, vigila
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
