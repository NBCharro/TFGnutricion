const modalNutrientes = document.getElementById('modalNutrientes')
const tablaNutrientes = document.getElementById('tablaNutrientes')

document.addEventListener('click', (event) => {
    event.preventDefault;
    if (event.target.classList.contains('platoAlimento')) {
        const nombrePlato = event.target.children[0] ? event.target.children[0].innerHTML : event.target
            .innerHTML;
        crearModalNutrientes(nombrePlato);
        modalNutrientes.classList.toggle("hidden");
    }
    if (event.target == modalNutrientes || event.target.id == 'puedeCerrarModalNutrientes') {
        modalNutrientes.classList.toggle("hidden");
    }
})

async function crearModalNutrientes(plato) {
    tablaNutrientes.textContent = '';
    const datoTratadoAPI = await datoNutrientesAPI(plato);
    if (datoTratadoAPI) {
        for (const key in datoTratadoAPI) {
            crearBloquesModalHTMLConAlimento(key, datoTratadoAPI[key]);
        }
    } else {
        crearBloquesModalHTMLSinAlimento();
    }
}

// Buscar en la API
async function datoNutrientesAPI(plato) {
    const platoMinusculasSinTildes = nombreAlimentoMinusculasSinTildes(plato);
    //  const respuesta = await fetch(`https://api-nutricion.onrender.com/api/v1/alimentos/nombre=${plato}`)
    const respuesta = await fetch(`http://localhost:3000/api/v1/nombre=${platoMinusculasSinTildes}`)
    const respuestaAPI = await respuesta.json();
    // Tratar Datos API
    if (respuestaAPI.message == 'Alimento no encontrado') {
        return false;
    } else {
        const alimento = alimentoApiTratado(respuestaAPI[0]);
        return alimento;
    }
}

// Funcion para transformar el nombre del alimento a minusculas y quitar tildes
function nombreAlimentoMinusculasSinTildes(plato) {
    platoMinusculas = plato.toLowerCase();
    platoMinusculasSinTildes = platoMinusculas.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    return platoMinusculasSinTildes;
}

// function convertirPlatoArray(str) {
//     const regex = /(\d*)\s*([^\d+]+)(?=\s*\+|$)/g;
//     const matches = [...str.matchAll(regex)];
//     const result = matches.map((match) => {
//         const quantity = match[1] === "" ? 1 : parseInt(match[1]);
//         const ingredient = match[2].trim();
//         return [quantity, ingredient];
//     });
//     return result.length > 0 ? result.flat() : [str];
// }

// Transformar el alimento obtenido de la API en un objeto que podamos usar
function alimentoApiTratado(respuestaAPI) {
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

function crearBloquesModalHTMLConAlimento(key, value) {
    const nombreNutriente = document.createElement("p");
    const valorNutriente = document.createElement("p");
    nombreNutriente.className = 'rounded-lg bg-gray-800 border-gray-700 text-right px-4 text-white';
    valorNutriente.className = 'rounded-lg bg-gray-800 border-gray-700 px-4';
    nombreNutriente.textContent = key;
    valorNutriente.textContent = value;
    tablaNutrientes.appendChild(nombreNutriente);
    tablaNutrientes.appendChild(valorNutriente);
}

function crearBloquesModalHTMLSinAlimento() {
    const mensajeError = document.createElement("p");
    mensajeError.className = 'rounded-lg bg-gray-800 border-gray-700 px-4 text-white col-span-2 text-center';
    mensajeError.textContent = 'Alimento no encontrado';
    tablaNutrientes.appendChild(mensajeError);
}
