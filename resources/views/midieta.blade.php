@extends ('layouts.main-layout')
@section('page-title', 'Mi dieta')
@section('content-area')
    <div class="md:grid md:grid-cols-2">
        <div class="">
            @include('components.midieta.grafico')
        </div>
        <div>
            @include('components.midieta.platos')
        </div>
    </div>
@endsection
