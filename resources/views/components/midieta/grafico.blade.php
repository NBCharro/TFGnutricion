    <div class="overflow-hidden rounded-lg shadow-lg md:m-2 lg:ring lg:ring-tertiary-100 lg:hover:ring-primary-50">
        <canvas class="md:p-1 bg-gray-50 dark:bg-tertiary-700" id="chartLine"></canvas>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart line -->
    <script>
        const fechas = @js($peso_cliente['fecha']);
        const pesos = @js($peso_cliente['peso']);
        const peso_teorico = @js($peso_cliente['peso_teorico']);
        const peso_final_1 = @js($peso_cliente['peso_final_1']);
        let peso_final_2 = @js($peso_cliente['peso_final_2']);
        let nota_pasos = @js($peso_cliente['nota_pasos']);
    </script>
    <script src="{{ asset('js/midieta/grafico.js') }}" defer></script>
