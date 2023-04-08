@extends ('layouts.main-layout')
@section('page-title', 'Nuevo cliente')
@section('content-area')
    @if (!isset($cliente_seleccionado))
        @include('components.nuevadieta.nuevo_cliente')
    @endif
    @if (isset($clientes))
        @include('components.nuevadieta.modificar_cliente')
    @endif
@endsection
