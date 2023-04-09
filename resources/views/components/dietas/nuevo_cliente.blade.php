@php
    $id_cliente_anterior = '';
    $nombre_apellido_anterior = '';
    $telefono_anterior = '';
    $email_anterior = '';
    $direccion_anterior = '';
    $fecha_inicial_anterior = 0;
    $peso_inicial_anterior = 0;
    $peso_final_1_anterior = 0;
    $peso_final_2_anterior = 0;
    if (isset($cliente_nuevo) && $cliente_existe) {
        $id_cliente_anterior = $cliente_nuevo['id_cliente'];
        $nombre_apellido_anterior = $cliente_nuevo['nombre_apellidos'];
        $telefono_anterior = $cliente_nuevo['telefono'];
        $email_anterior = $cliente_nuevo['email'];
        $direccion_anterior = $cliente_nuevo['direccion'];
        $fecha_inicial_anterior = $cliente_nuevo['fecha_inicio'];
        $peso_inicial_anterior = $cliente_nuevo['peso_inicial'];
        $peso_final_1_anterior = $cliente_nuevo['peso_final_1'];
        $peso_final_2_anterior = $cliente_nuevo['peso_final_2'];
    }
@endphp
@if (isset($cliente_existe) && $cliente_existe)
    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 md:mx-4"
        role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-bold">Ya existe un cliente con ese codigo</span> introduzca otro codigo o modifique al
            cliente.
        </div>
    </div>
@endif
@if (isset($cliente_guardado) && $cliente_guardado)
    <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-bold">Nuevo cliente guardado correctamente</span> Avise al cliente que rellene el
            formulario inicial.
        </div>
    </div>
@endif
<form action="{{ route('nuevo_cliente') }}" method="post" class="md:mx-4 p-4">
    @csrf
    <div class="md:grid md:grid-cols-3 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="id_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Id Cliente
            </label>
            <input type="text" name="id_cliente" id="id_cliente" required value="{{ $id_cliente_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="nombre_apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nombre y apellidos
            </label>
            <input type="text" name="nombre_apellidos" id="nombre_apellidos" required
                value="{{ $nombre_apellido_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Telefono
            </label>
            <input type="tel" name="telefono" id="telefono" value="{{ $telefono_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="md:grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-2 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email" id="email" value="{{ $email_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Direccion
            </label>
            <input type="text" name="direccion" id="direccion" value="{{ $direccion_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div class="md:grid md:grid-cols-4 md:gap-2">
        <div class="relative z-0 w-full mb-2 group">
            <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Fecha inicio
            </label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" required value="{{ $fecha_inicial_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_inicial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso inicial (Kg)
            </label>
            <input type="number" name="peso_inicial" id="peso_inicial" required min="0" step="0.5"
                value="{{ $peso_inicial_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_final_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso final 1 (Kg)
            </label>
            <input type="number" name="peso_final_1" id="peso_final_1" required min="0" step="0.5"
                value="{{ $peso_final_1_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="relative z-0 w-full mb-2 group">
            <label for="peso_final_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Peso final 2 (Kg)
            </label>
            <input type="number" name="peso_final_2" id="peso_final_2" min="0" step="0.5"
                value="{{ $peso_final_2_anterior }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    </div>
    <div id="pregunta_respuesta" class="bg-quaternary-200 md:p-2 rounded-xl md:my-5 p-2">
        <input type="text" name="pregunta_1"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white my-4"
            placeholder="Escriba la pregunta">
        <div id="crearMas_preguntas"
            class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4 cursor-pointer">
            Crear mas preguntas</div>
    </div>
    <button type="submit"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4">
        Guardar cliente nuevo
    </button>
</form>

<script src="{{ asset('js/dietas/pregunta_respuesta.js') }}" defer></script>
