<section class="flex flex-col items-center">
    <div class="block max-w-sm rounded-lg pt-6">
        <div class="relative mb-4">
            <select id="plato"
                class="border text-m rounded-lg block w-full py-2.5 px-8 dark:bg-primary-500 dark:text-white
bg-tertiary-100 text-black">
                @foreach ($platos as $key => $plato)
                    @if (is_array($plato) && count($plato) > 0)
                        @if ($key == 'mediamanana')
                            <option value="{{ $key }}">Media mañana</option>
                        @else
                            <option value="{{ $key }}">{{ ucfirst($key) }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="container mx-auto px-6 pb-6 grid grid-cols-1 gap-4 md:grid-cols-2 text-white" id="mostrarPlatos">
    </div>
</section>
<script>
    platosPHP = @js($platos);
</script>
<script src="{{ asset('js/conectado/platos.js') }}" defer></script>
