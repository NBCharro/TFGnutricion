@extends ('layouts.main-layout')
@section('page-title', 'Dietas clientes')
@section('content-area')
    <div class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed pb-1">
        @include('components.dietas.alertas')
        @if (isset($clientes))
            @include('components.dietas.selectClientes')
            @include('components.dietas.modificar_cliente')
        @endif
        <hr class="h-px my-5 border-0 bg-gray-700">
        @if (!isset($cliente_seleccionado))
            @include('components.dietas.nuevo_cliente')
        @endif
    </div>
@endsection
