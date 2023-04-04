@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <div class="block max-w-sm rounded-lg pt-6">
        <div class="relative mb-4">
            <select id="plato"
                class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800">
                @php
                    foreach ($clientes as $cliente) {
                        echo "<option>$cliente</option>";
                    }
                @endphp
            </select>
        </div>
    </div>
@endsection
