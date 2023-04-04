@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="relative dark:text-white text-dark">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <form action="#" class="space-y-8">
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm">Mensaje</label>
                    <textarea id="message" rows="6"
                        class="bg-gray-50 border text-sm rounded-lg
                         w-full p-2.5 resize-none"
                        placeholder="Escriba su mensaje"></textarea>
                </div>
                <button type="submit"
                    class="py-3 px-5 text-sm text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Enviar</button>
            </form>
        </div>
    </section>
@endsection
