@if (isset($platos))
    {{-- No hay datos del cliente en la DB --}}
    <section class="bg-white dark:bg-gray-900 md:w-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
            <svg class="mx-auto mb-4 w-10 h-10 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M331.8 224.1c28.29 0 54.88 10.99 74.86 30.97l19.59 19.59c40.01-17.74 71.25-53.3 81.62-96.65c5.725-23.92 5.34-47.08 .2148-68.4c-2.613-10.88-16.43-14.51-24.34-6.604l-68.9 68.9h-75.6V97.2l68.9-68.9c7.912-7.912 4.275-21.73-6.604-24.34c-21.32-5.125-44.48-5.51-68.4 .2148c-55.3 13.23-98.39 60.22-107.2 116.4C224.5 128.9 224.2 137 224.3 145l82.78 82.86C315.2 225.1 323.5 224.1 331.8 224.1zM384 278.6c-23.16-23.16-57.57-27.57-85.39-13.9L191.1 158L191.1 95.99l-127.1-95.99L0 63.1l96 127.1l62.04 .0077l106.7 106.6c-13.67 27.82-9.251 62.23 13.91 85.39l117 117.1c14.62 14.5 38.21 14.5 52.71-.0016l52.75-52.75c14.5-14.5 14.5-38.08-.0016-52.71L384 278.6zM227.9 307L168.7 247.9l-148.9 148.9c-26.37 26.37-26.37 69.08 0 95.45C32.96 505.4 50.21 512 67.5 512s34.54-6.592 47.72-19.78l119.1-119.1C225.5 352.3 222.6 329.4 227.9 307zM64 472c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24S88 434.7 88 448C88 461.3 77.25 472 64 472z" />
            </svg>
            <h1
                class="mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-5xl xl:text-6xl dark:text-white">
                Aun no hay datos
            </h1>
            <p class="font-bold text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                Recuerde que tiene que contestar a las preguntas de
            </p>
            <p class="font-bold text-tertiary-400 md:text-lg xl:text-xl dark:text-primary-500 underline">
                <a href="{{ route('comenzarmiplan') }}">Comenzar mi plan</a>
            </p>
            <p class="font-light text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                Si pasados unos dias el problema persiste pongase en contacto con su nutricionista
            </p>
        </div>
    </section>
@else
    <section class="bg-white dark:bg-gray-900 flex justify-center">
        <div class="py-8 px-4 mx-auto text-center lg:py-16 lg:px-12 md:w-fit">
            <svg class="mx-auto mb-4 w-10 h-10 text-gray-400" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M22.775 8C22.9242 8.65461 23 9.32542 23 10H14V1C14.6746 1 15.3454 1.07584 16 1.22504C16.4923 1.33724 16.9754 1.49094 17.4442 1.68508C18.5361 2.13738 19.5282 2.80031 20.364 3.63604C21.1997 4.47177 21.8626 5.46392 22.3149 6.55585C22.5091 7.02455 22.6628 7.5077 22.775 8ZM20.7082 8C20.6397 7.77018 20.5593 7.54361 20.4672 7.32122C20.1154 6.47194 19.5998 5.70026 18.9497 5.05025C18.2997 4.40024 17.5281 3.88463 16.6788 3.53284C16.4564 3.44073 16.2298 3.36031 16 3.2918V8H20.7082Z"
                    fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1 14C1 9.02944 5.02944 5 10 5C10.6746 5 11.3454 5.07584 12 5.22504V12H18.775C18.9242 12.6546 19 13.3254 19 14C19 18.9706 14.9706 23 10 23C5.02944 23 1 18.9706 1 14ZM16.8035 14H10V7.19648C6.24252 7.19648 3.19648 10.2425 3.19648 14C3.19648 17.7575 6.24252 20.8035 10 20.8035C13.7575 20.8035 16.8035 17.7575 16.8035 14Z"
                    fill="currentColor" />
            </svg>
            <h1
                class="mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-5xl xl:text-6xl dark:text-white">
                ¡Bienvenido a tu zona personalizada!
            </h1>
            <p class="font-bold text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                No hay nada más motivador que ver tu progreso en tiempo real.
            </p>
            <p class="font-light text-gray-500 md:text-lg xl:text-xl dark:text-gray-400 my-2">
                En esta página
                encontrarás la dieta personalizada que hemos diseñado especialmente para ti, basada en tus gustos,
                necesidades y
                objetivos.
            </p>
            <p class="font-light text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                ¡Adelante, pruébala! Te aseguramos que disfrutarás de los platos saludables y deliciosos que te hemos
                preparado.
            </p>
        </div>
    </section>
@endif
