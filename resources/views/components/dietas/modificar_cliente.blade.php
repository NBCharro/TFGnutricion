@if (isset($cliente_seleccionado))
    <form action="{{ route('actualizar_cliente') }}" method="post" class="md:mx-4 p-2">
        @csrf
        @include('components.dietas.datos')
        @include('components.dietas.perdida_peso')
        @include('components.dietas.textos')
        @include('components.dietas.platos')
        @include('components.dietas.preguntas_respuestas')
        <button type="submit"
            class="self-center font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center bg-primary text-white hover:bg-tertiary-100 hover:text-black mt-4">
            Guardar cliente
        </button>
    </form>
@endif
