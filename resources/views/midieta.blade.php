@extends ('layouts.main-layout')
@section('page-title', 'Mi dieta')
@section('content-area')
    <section class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        @include('components.midieta.alertas')
        <div id="buscarCliente" class="lg:grid lg:grid-cols-2">
            @if (isset($peso_cliente) && count($peso_cliente) != 0 && isset($texto_dietas) && count($texto_dietas) != 0)
                <div class="flex flex-col justify-center">
                    @include('components.midieta.grafico')
                </div>
                <div>
                    @include('components.midieta.platos')
                </div>
                <div class="md:col-span-2">
                    @include('components.midieta.texto')
                </div>
            @else
                <div class="md:col-span-2">
                    @include('components.midieta.buscarCliente')
                </div>
                @include('components.midieta.cuadroTexto')
            @endif
        </div>
        <div>
            @include('components.midieta.contactoInterno')
        </div>
    </section>
@endsection
