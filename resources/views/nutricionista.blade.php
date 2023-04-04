@extends ('layouts.main-layout')
@section('page-title', 'Nutricionista')
@section('content-area')
    <div
        class="lg:grid lg:grid-cols-2 bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="md:col-span-2 flex justify-items-center justify-center ">
            @include('components.nutricionista.selectClientes')
        </div>
        <div class="flex flex-col justify-center">
            @include('components.nutricionista.grafico')
            @include('components.nutricionista.guardarPeso')
        </div>
        <div>
            @include('components.nutricionista.platos')
        </div>
        <div class="md:col-span-2">
            @include('components.nutricionista.texto')
        </div>
    </div>
@endsection
