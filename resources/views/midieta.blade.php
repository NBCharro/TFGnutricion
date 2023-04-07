@extends ('layouts.main-layout')
@section('page-title', 'Mi dieta')
@section('content-area')
    <section>
        @if (isset($mensaje) && $mensaje == 'No existe')
            <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 md:mx-4"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-bold">El codigo introducido no es correcto</span> intentelo de nuevo o contacte con
                    nuestros nutricionistas para arreglarlo.
                </div>
            </div>
        @endif
        <div id="buscarCliente"
            class="lg:grid lg:grid-cols-2 bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
            <div class="md:col-span-2">
                @include('components.midieta.buscarCliente')
            </div>
            @if (isset($peso_cliente))
                <div class="flex flex-col justify-center">
                    @include('components.midieta.grafico')
                </div>
                <div>
                    @include('components.midieta.platos')
                </div>
                <div class="md:col-span-2">
                    @include('components.midieta.texto')
                </div>
                <div class="md:col-span-2">
                    @include('components.midieta.contactoInterno')
                </div>
            @endif
        </div>
    </section>
@endsection
