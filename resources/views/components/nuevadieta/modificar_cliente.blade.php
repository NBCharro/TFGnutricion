@include('components.nuevadieta.selectClientes')
@if (isset($cliente_seleccionado))
    <form action="{{ route('modificar_cliente') }}" method="post" class="md:mx-4">
        @csrf
        @include('components.nuevadieta.datos')
        @include('components.nuevadieta.perdida_peso')
        @include('components.nuevadieta.textos')
        @include('components.nuevadieta.platos')
        <button type="submit"
            class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4">
            Guardar cliente nuevo
        </button>
    </form>
@endif
<script src="{{ asset('js/nuevadieta_platos.js') }}" defer></script>
<script src="{{ asset('js/nuevadieta_textos.js') }}" defer></script>
