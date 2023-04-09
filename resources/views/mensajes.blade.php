@extends ('layouts.main-layout')
@section('page-title', 'Mensajes')
@section('content-area')
    <div class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed pb-1">
        @include('components.mensajes.alertas')
        @if (count($mensajes_internos) == 0 && count($mensajes_externos) == 0)
            @include('components.mensajes.sinmensajes')
        @else
            <div class="md:flex md:shadow-lg rounded-3xl text-black dark:text-white mx-6">
                @include('components.mensajes.listamensajes')
                @include('components.mensajes.ampliarmensajes')
            </div>
            <script>
                const mensajes_internos = @js($mensajes_internos);
                const mensajes_externos = @js($mensajes_externos);
            </script>
            <script src="{{ asset('js/mensajes/mostrar.js') }}" defer></script>
        @endif
    </div>
@endsection
