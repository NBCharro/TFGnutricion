<section class="flex justify-center">
    <div class="mb-3 xl:w-96">
        <form action="{{ route('clientes') }}" method="post" class="relative mb-4 flex w-full flex-wrap items-stretch">
            @csrf
            <div class="relative mb-4">
                <select id="selectClientes" onchange="this.form.submit()" name="selectClientes"
                    class="border text-m rounded-lg block w-full py-2.5 px-8 dark:bg-primary-500 dark:text-white
bg-tertiary-100 text-black">
                    <option disabled selected>Selecciona una opción</option>
                    @php
                        foreach ($clientes as $id_cliente => $cliente) {
                            $cliente_elegido = '';
                            if (isset($platos) && $platos['id_cliente'] == $id_cliente) {
                                $cliente_elegido = 'selected';
                            }
                            echo "<option value='$id_cliente' $cliente_elegido>$cliente</option>";
                        }
                    @endphp
                </select>
            </div>
        </form>
    </div>
</section>
