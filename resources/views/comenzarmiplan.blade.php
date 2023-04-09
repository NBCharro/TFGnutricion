@extends ('layouts.main-layout')
@section('page-title', 'Comenzar mi plan')
@section('content-area')
    <div class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed pb-1">
        @include('components.comenzarmiplan.alertas')
        @include('components.comenzarmiplan.cuadrobusqueda')
        @include('components.comenzarmiplan.formulario_preguntas_respuestas')
    </div>
@endsection
