const crearMas_preguntas = document.getElementById('crearMas_preguntas');
const pregunta_respuesta = document.getElementById('pregunta_respuesta');
let numero_pregunta = 1;

crearMas_preguntas.addEventListener('click', (event) => {
    event.preventDefault;
    crear_nueva_pregunta();
})

function crear_nueva_pregunta() {
    const pregunta = document.createElement("input");

    pregunta.className =
        'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white my-4';

    numero_pregunta++;
    pregunta.name = `pregunta_${numero_pregunta}`;

    pregunta.placeholder = 'Escriba la pregunta';

    pregunta_respuesta.insertBefore(pregunta, crearMas_preguntas);
}
