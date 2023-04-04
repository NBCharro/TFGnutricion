@extends ('layouts.main-layout')
@section('page-title', 'Mi dieta')
@section('content-area')
    <div
        class="lg:grid lg:grid-cols-2 bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="flex flex-col justify-center">
            @include('components.midieta.grafico')
        </div>
        <div>
            @include('components.midieta.platos')
        </div>
        <div class="md:col-span-2">
            @include('components.midieta.texto')
        </div>
    </div>
@endsection
