@extends ('layouts.main-layout')
@section('page-title', 'Dietas clientes')
@section('content-area')
    @if (!isset($cliente_seleccionado))
        @include('components.dietas.nuevo_cliente')
    @endif
    @if (isset($clientes))
        @include('components.dietas.modificar_cliente')
    @endif
@endsection
