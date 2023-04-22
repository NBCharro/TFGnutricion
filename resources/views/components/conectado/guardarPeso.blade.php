<form action="{{ route('guardar_peso') }}" method="post"
    class="relative mb-4 w-full flex-wrap items-stretch grid md:grid-cols-3 md:gap-3 md:mx-4">
    @csrf
    <div class="relative z-0 w-full mb-2 group">
        <label for="fechaPeso" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
            Fecha
        </label>
        <select name="fechaPeso" id="fechaPeso"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @foreach ($fechas_pesos_notaspasos['fecha'] as $key => $fecha)
                @php
                    $ultima_fecha = '';
                    if ($fechas_pesos_notaspasos['peso'][$key] > 0) {
                        $ultima_fecha = 'selected';
                    }
                @endphp
                <option {{ $ultima_fecha }}>{{ $fecha }}</option>
            @endforeach
        </select>
    </div>
    <div class="relative z-0 w-auto mb-1 group">
        <label for="peso" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
            Peso
        </label>
        <input type="number" name="peso" id="peso" min="0" value="0" step="0.1"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="60" required>
    </div>
    <div class="relative z-0 w-auto mb-1 group">
        <label for="nota_pasos" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
            Nota o pasos
        </label>
        <input type="number" name="nota_pasos" id="nota_pasos" min="0" value="0" step="0.1"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="60" required>
    </div>
    <input type="hidden" name="id_cliente" value="{{ $fechas_pesos_notaspasos['id_cliente'] }}">
    <button type="submit"
        class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center uppercase
            bg-primary text-white hover:bg-tertiary-100 hover:text-black">
        Guardar
    </button>
</form>
<script>
    const cambiar_fechas = @js($fechas_pesos_notaspasos['fecha']);
    const cambiar_pesos = @js($fechas_pesos_notaspasos['peso']);
    const cambiar_notas_pasos = @js($fechas_pesos_notaspasos['nota_pasos']);
</script>
<script src="{{ asset('js/conectado/guardarPeso.js') }}" defer></script>
