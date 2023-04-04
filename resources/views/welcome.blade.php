@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="relative dark:text-white text-dark">
        <button id="botonAPI"
            class="py-3 px-5 text-sm text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Enviar</button>
    </section>
    <script>
        const botonAPI = document.getElementById('botonAPI');
        botonAPI.addEventListener('click', (event) => {
            event.preventDefault;
            pruebaAPI(comida[0]);

        })
        const comida = [
            'higado cerdo',
            'morcilla de embutido',
            'golden grahams',
            'fabada asturiana litoral',
            'callos a la madrileña la tila',
            'lentejas',
            'lentejas con chorizo litoral',
            'higado ternera',
            'pastel manzana hojaldre',
            'galletas choco flakes',
            'donettes',
            'lomo embuchado'
        ];
        async function pruebaAPI(comida) {
            // let respuesta = await fetch(`https://api-nutricion.onrender.com/api/v1/alimentos/nombre=${comida}`)
            let respuesta = await fetch(`http://localhost:3000/api/v1/alimentos/nombre=${comida}`)
            // let respuesta = await fetch(`http://localhost:3000/api/v1/alimentos`)
            let json = await respuesta.json();
            console.log(json);
        }
    </script>
@endsection
