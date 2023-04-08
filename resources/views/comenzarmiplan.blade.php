@extends ('layouts.main-layout')
@section('page-title', 'Comenzar mi plan')
@section('content-area')
    @include('components.comenzarmiplan.alertas')
    @include('components.comenzarmiplan.cuadrobusqueda')
    @include('components.comenzarmiplan.formulario_preguntas_respuestas')
@endsection
