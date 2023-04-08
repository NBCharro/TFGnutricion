const mostrar_preguntas_respuestas = document.getElementById('mostrar_preguntas_respuestas');
const preguntas_respuestas = document.getElementById('preguntas_respuestas');

mostrar_preguntas_respuestas.addEventListener('click', (event) => {
    event.preventDefault;
    mostrar_ocultar_preguntas_respuestas();
})

function mostrar_ocultar_preguntas_respuestas() {
    // preguntas_respuestas.classList.toggle("md:grid");
    preguntas_respuestas.classList.toggle("md:flex");
    preguntas_respuestas.classList.toggle("hidden");
    if (mostrar_preguntas_respuestas.innerText == 'Mostrar preguntas y respuestas') {
        mostrar_preguntas_respuestas.innerText = 'Ocultar preguntas y respuestas';
    } else {
        mostrar_preguntas_respuestas.innerText = 'Mostrar preguntas y respuestas';
    }
}
