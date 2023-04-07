@extends ('layouts.main-layout')
@section('page-title', 'Nutricionista')
@section('content-area')
    <div
        class="lg:grid lg:grid-cols-2 bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="md:col-span-2">
            @include('components.conectado.selectClientes')
        </div>
        @if (isset($peso_cliente))
            <div class="flex flex-col justify-center">
                @include('components.conectado.grafico')
                @include('components.conectado.guardarPeso')
            </div>
            <div>
                @include('components.conectado.platos')
            </div>
            <div class="md:col-span-2">
                @include('components.conectado.texto')
            </div>
        @endif
    </div>
@endsection
