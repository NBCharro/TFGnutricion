@php
    if (isset($peso_cliente)) {
        dump($peso_cliente);
        dump($platos);
        dump($texto_dietas);
    }
@endphp

@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <form action="{{ route('pruebas') }}" method="post" class="relative mb-4 flex w-full flex-wrap items-stretch">
        @csrf
        {{-- <div class="block max-w-sm rounded-lg pt-6"> --}}
        <div class="relative mb-4">
            <select id="selectClientes" onchange="this.form.submit()" name="selectClientes"
                class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800">
                @php
                    foreach ($clientes as $id_cliente => $cliente) {
                        echo "<option value='$id_cliente'>$cliente</option>";
                    }
                @endphp
            </select>
        </div>
        {{-- </div> --}}
    </form>
@endsection
