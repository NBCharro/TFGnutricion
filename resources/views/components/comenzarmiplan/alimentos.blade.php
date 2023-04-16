<section class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed pb-1">
    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12 pt-12 flex flex-col items-center">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold dark:text-white">Lista Alimentos API</h2>
        <form action="{{ route('mostrarNutrientesAlimento') }}" method="post" class="w-fit md:mx-5">
            @csrf
            <div class="mb-4">
                <select id="nombreAlimento" onchange="this.form.submit()" name="nombreAlimento"
                    class="border text-m rounded-lg block w-fit py-2.5 px-8 bg-tertiary-100 text-black dark:bg-gray-800 dark:text-white">
                    <option disabled selected>Selecciona un alimento</option>
                    @foreach ($listaAlimentosAPI as $alimento)
                        <option value="{{ $alimento }}">{{ ucfirst($alimento) }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    @if (isset($alimentoElegidoAPI))
        @php
            dump($alimentoElegidoAPI);
        @endphp
    @endif
</section>
