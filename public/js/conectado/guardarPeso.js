const input_fechaPeso = document.getElementById('fechaPeso');
const input_peso = document.getElementById('peso');
const input_nota_pasos = document.getElementById('nota_pasos');

// Poner el peso y las notas_pasos acorde a la fecha
actualizarPesoNotasPasosSegunFecha();

fechaPeso.addEventListener('change', actualizarPesoNotasPasosSegunFecha);

function actualizarPesoNotasPasosSegunFecha() {
    // Buscar la posicion de la fecha y actualizar los valores de peso y nota o pasos
    input_peso.value = cambiar_pesos[fechas.indexOf(fechaPeso.value)];
    input_nota_pasos.value = cambiar_notas_pasos[fechas.indexOf(fechaPeso.value)];
}
