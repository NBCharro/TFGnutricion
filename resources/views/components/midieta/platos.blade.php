<section class="flex flex-col items-center">
    <div class="block max-w-sm rounded-lg pt-6">
        <div class="relative mb-4">
            <select id="plato"
                class="border text-m rounded-lg block w-full py-2.5 px-8 bg-primary-600 text-white dark:bg-gray-800">
                @foreach ($platos as $key => $plato)
                    @if (is_array($plato) && count($plato) > 0)
                        @if ($key == 'mediamanana')
                            <option value="<?php echo "$key"; ?>">Media mañana</option>
                        @else
                            <option value="<?php echo "$key"; ?>"><?php echo ucfirst($key); ?></option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="container mx-auto px-6 pb-6 grid grid-cols-1 gap-4 md:grid-cols-2 text-white" id="mostrarPlatos">
    </div>
</section>
{{-- MODAL --}}
<div id="modalNutrientes"
    class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="flex justify-center" id="puedeCerrarModalNutrientes">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <div class="relative rounded-lg shadow bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                    <h3 class="text-xl font-semibold text-white">
                        Nutrientes
                    </h3>
                    <button id="puedeCerrarModalNutrientes"
                        class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white">
                        <svg id="puedeCerrarModalNutrientes" aria-hidden="true" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path id="puedeCerrarModalNutrientes" fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <div id="tablaNutrientes" class="w-full text-sm text-left text-gray-400 grid grid-cols-2 gap-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- FIN MODAL --}}
<script>
    platosPHP = @js($platos);
</script>
<script src="{{ asset('js/midieta/platos.js') }}" defer></script>
<script src="{{ asset('js/midieta/modalAPI.js') }}" defer></script>
