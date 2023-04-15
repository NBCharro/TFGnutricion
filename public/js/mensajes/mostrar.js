listaMensajes.addEventListener('click', (event) => {
    if (event.target.id == 'listaMensajes') {
        // Si se pulsa en la zona blanca entre mensajes que no haga nada
        return;
    }
    mostrar_mensaje_pantalla(event);
});

function mostrar_mensaje_pantalla(event) {
    const id_mensaje = document.getElementById("id_mensaje");
    const li = event.target.closest("li");

    if (id_mensaje.value == li.id) {
        // Si se pulsa sobre el mismo mensaje que aparece en pantalla, no hace nada
        return
    }

    if (li) {
        const id = li.getAttribute("id").split('_');
        marcar_mensaje_leido(id[0], id[1]);
    }
}

function marcar_mensaje_leido(valor_mensaje_interno_externo, valor_id_mensaje) {
    const formulario_mensajes = document.getElementById('formulario_marcar_mensaje_leido')
    const id_mensaje = document.createElement('input');
    id_mensaje.type = 'hidden';
    id_mensaje.name = 'id_mensaje';
    id_mensaje.value = valor_id_mensaje;
    const mensaje_interno_externo = document.createElement('input');
    mensaje_interno_externo.type = 'hidden';
    mensaje_interno_externo.name = 'mensaje_interno_externo';
    mensaje_interno_externo.value = valor_mensaje_interno_externo;

    formulario_mensajes.appendChild(id_mensaje);
    formulario_mensajes.appendChild(mensaje_interno_externo);

    formulario_mensajes.submit();
}
