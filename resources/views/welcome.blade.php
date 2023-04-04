@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section>
        <div class="bg-white dark:bg-gray-900 p-4">
            <div class="mx-auto max-w-screen-xl text-white">
                <h2 class="text-2xl font-extrabold leading-tight">
                    @php
                        echo $texto_dietas['titulo'];
                    @endphp
                </h2>
                <p class="text-gray-400">
                    @php
                        echo $texto_dietas['parrafo1'];
                    @endphp
                </p>
                <h2 class="my-4 text-2xl font-extrabold leading-tight text-white">
                    Aceite
                </h2>
                <p class="text-gray-400">
                    @php
                        echo $texto_dietas['parrafo2'];
                    @endphp
                </p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-900 p-4">
            <div class="mx-auto max-w-screen-xl">
                <div class="grid text-left border-gray-200 md:gap-2 md:grid-cols-2">
                    @php
                        foreach ($texto_dietas as $key => $value) {
                            if (strcasecmp($key, 'titulo') != 0 && strcasecmp($key, 'parrafo1') != 0 && strcasecmp($key, 'parrafo2') != 0) {
                                echo '<div>';
                                echo '<h3 class="flex items-center my-4 text-white text-xl">';
                                echo $key;
                                echo '</h3>';
                                echo '<p class="text-gray-400">';
                                echo $value;
                                echo '</p>';
                                echo '</div>';
                            }
                        }
                    @endphp
                </div>
            </div>
        </div>
    </section>
@endsection
