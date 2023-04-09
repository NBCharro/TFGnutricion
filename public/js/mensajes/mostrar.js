const listaMensajes = document.getElementById('listaMensajes');
const verMensajesNombre = document.getElementById('verMensajesNombre');
const verMensajesEmail = document.getElementById('verMensajesEmail');
const verMensajesTitulo = document.getElementById('verMensajesTitulo');
const verMensajesMensaje = document.getElementById('verMensajesMensaje');
const id_mensaje = document.getElementById('id_mensaje');

listaMensajes.addEventListener('click', (event) => {
    if (event.target.id == 'listaMensajes') {
        // Si se pulsa en la zona blanca entre mensajes que no haga nada
        return;
    }
    const todosElementosLi = document.querySelectorAll("li");
    todosElementosLi.forEach(element => {
        element.classList.remove("bg-tertiary-500");
    });
    const li = event.target.closest("li");
    if (li) {
        const id = li.getAttribute("id").split('_');
        li.classList.toggle("bg-tertiary-500");
        if (id[0] == 'interno') {
            mensajes_internos.forEach(element => {
                if (element.id == id[1]) {
                    verMensajesNombre.innerHTML = '';
                    verMensajesEmail.innerHTML = '';
                    verMensajesTitulo.innerHTML = '';
                    verMensajesMensaje.innerHTML = '';
                    verMensajesNombre.innerHTML = element.nombre;
                    verMensajesEmail.innerHTML = element.id_cliente;
                    verMensajesTitulo.innerHTML = 'Cliente';
                    verMensajesMensaje.innerHTML = element.mensaje;
                    id_mensaje.value = li.id;
                }
            });
        } else {
            mensajes_externos.forEach(element => {
                if (element.id == id[1]) {
                    verMensajesNombre.innerHTML = '';
                    verMensajesEmail.innerHTML = '';
                    verMensajesTitulo.innerHTML = '';
                    verMensajesMensaje.innerHTML = '';
                    verMensajesNombre.innerHTML = element.nombre;
                    verMensajesEmail.innerHTML = element.email;
                    verMensajesTitulo.innerHTML = 'No cliente';
                    verMensajesMensaje.innerHTML = element.mensaje;
                    id_mensaje.value = li.id;
                }
            });
        }
    }
});
