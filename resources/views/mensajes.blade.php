@extends ('layouts.main-layout')
@section('page-title', 'Mensajes')
@section('content-area')
    @include('components.mensajes.alertas')
    @if (count($mensajes_internos) == 0 && count($mensajes_externos) == 0)
        @include('components.mensajes.sinmensajes')
    @else
        <main class="md:flex md:shadow-lg rounded-3xl text-black dark:text-white mx-6">
            @include('components.mensajes.listamensajes')
            @include('components.mensajes.ampliarmensajes')
        </main>
        <script>
            const mensajes_internos = @js($mensajes_internos);
            const mensajes_externos = @js($mensajes_externos);
        </script>
        <script src="{{ asset('js/mensajes/mostrar.js') }}" defer></script>
    @endif
@endsection
