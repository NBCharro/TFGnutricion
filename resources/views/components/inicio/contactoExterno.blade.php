<section class="relative bg-[url('/public/images/inicio/formulario.jpg')] bg-cover bg-center bg-no-repeat bg-fixed">
    <div
        class="absolute inset-0
    bg-transparent bg-gradient-to-r from-primary-700/80 to-primary-900/60
    dark:bg-tertiary-700/5 dark:from-tertiary-700 dark:to-tertiary-700/5">
    </div>
    <div class="relative py-8 lg:py-16 px-4 mx-auto">
        @include('components.inicio.alertas')
    </div>
    <div class="relative py-8 lg:py-16 px-4 mx-auto max-w-screen-md text-white">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center">Contacto</h2>
        <form action="{{ route('mensaje_externo') }}" method="post" class="md:mx-4">
            @csrf
            <div class="my-2">
                <label for="nombre" class="block mb-2 text-sm">Nombre</label>
                <input type="text" name="nombre"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Escriba su nombre" required>
            </div>
            <div class="my-2">
                <label for="email" class="block mb-2 text-sm">Teléfono</label>
                <input type="tel" name="telefono"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Escriba su teléfono" required>
            </div>
            <div class="my-2">
                <label for="email" class="block mb-2 text-sm">Email</label>
                <input type="email" name="email"
                    class="bg-gray-50 border text-gray-900 text-sm rounded-lg
                w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Escriba su email" required>
            </div>
            <div class="sm:col-span-2 my-2">
                <label for="mensaje" class="block mb-2 text-sm">Mensaje</label>
                <textarea name="mensaje" rows="6"
                    class="resize-none bg-gray-50 border text-gray-900 text-sm rounded-lg
                w-full p-2.5 dark:bg-tertiary-700 dark:border-tertiary-700 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Escriba su mensaje"></textarea>
            </div>
            <button type="submit"
                class="font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center
            bg-primary text-white hover:bg-tertiary-100 hover:text-black my-4">Enviar</button>
        </form>
    </div>
</section>
@if (isset($mensaje_enviado))
    <script>
        document.getElementById("mensaje_externo").scrollIntoView();
    </script>
@endif
