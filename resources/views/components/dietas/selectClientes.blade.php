<section class="flex flex-wrap justify-center">
    <div class="mb-3 xl:w-96">
        <form action="{{ route('modificar_cliente') }}" method="post" class="w-fit md:mx-5">
            @csrf
            <div class="relative mb-4">
                <select id="selectClientes" onchange="this.form.submit()" name="selectClientes"
                    class="border text-m rounded-lg block w-full py-2.5 px-8 bg-tertiary-100 text-black dark:bg-gray-800 dark:text-white">
                    <option disabled selected>Selecciona una opción</option>
                    @php
                        foreach ($clientes as $id_cliente => $cliente) {
                            $cliente_elegido = '';
                            if (isset($cliente_seleccionado) && $cliente_seleccionado['id_cliente'] == $id_cliente) {
                                $cliente_elegido = 'selected';
                            }
                            echo "<option value='$id_cliente' $cliente_elegido>$cliente</option>";
                        }
                    @endphp
                </select>
            </div>
        </form>
    </div>
    @if (isset($cliente_seleccionado))
        <form action="{{ route('borrar_cliente') }}" method="post" class="w-fit md:mx-5">
            @csrf
            <input type="hidden" name="id_cliente" value="<?php echo $cliente_seleccionado['id_cliente']; ?>">
            <button type="submit"
                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br rounded-lg text-sm py-2.5 px-8 text-center mr-2 mb-2">
                Borrar cliente
            </button>
        </form>
    @endif
</section>
