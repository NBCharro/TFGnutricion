@extends ('layouts.main-layout')
@section('page-title', 'Pagina de pruebas')
@section('content-area')
    <section class="bg-white dark:bg-tertiary-700 bg-[url('/public/images/dotGrid.png')] bg-center bg-repeat bg-fixed">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12 pt-12">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold dark:text-white">Testimonios</h2>
        </div>
        <div class="container md:grid grid-rows-4 grid-cols-2 gap-4">
            <div class="row-start-2 row-end-4 col-start-1 place-self-end">
                <div
                    class="flex flex-col max-w-sm mx-4 my-6 shadow-lg
                    border-gray-100 bg-primary-500 text-white
                    dark:border-gray-600 dark:bg-gray-800 rounded-lg">
                    <div class="px-4 py-12 rounded-t-lg sm:px-8 md:px-12 dark:bg-gray-900">
                        <p class="relative px-6 py-1 text-lg italic text-center dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="w-8 h-8 text-tertiary-100">
                                <path d="M232,246.857V16H16V416H54.4ZM48,48H200V233.143L48,377.905Z"></path>
                                <path d="M280,416h38.4L496,246.857V16H280ZM312,48H464V233.143L312,377.905Z"></path>
                            </svg>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus quibusdam, eligendi
                            exercitationem molestias possimus facere.
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="absolute right-0 w-8 h-8 text-tertiary-100">
                                <path d="M280,185.143V416H496V16H457.6ZM464,384H312V198.857L464,54.1Z"></path>
                                <path d="M232,16H193.6L16,185.143V416H232ZM200,384H48V198.857L200,54.1Z"></path>
                            </svg>
                        </p>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center p-8 rounded-b-lg bg-tertiary-100 dark:text-gray-900">
                        <img src="https://source.unsplash.com/50x50/?portrait?1" alt=""
                            class="w-16 h-16 mb-2 -mt-16 bg-center bg-cover rounded-full ">
                        <p class="text-xl font-semibold leading-tight ">Distinctio Animi</p>
                        {{-- <p class="text-sm uppercase">Aliquam illum</p> --}}
                    </div>
                </div>
            </div>
            <div class="row-start-1 row-end-3 col-start-2">
                <div
                    class="flex flex-col max-w-sm mx-4 my-6 shadow-lg
                border-gray-100 bg-primary-500 text-white
                    dark:border-gray-600 dark:bg-gray-800 rounded-lg">
                    <div class="px-4 py-12 rounded-t-lg sm:px-8 md:px-12 dark:bg-gray-900">
                        <p class="relative px-6 py-1 text-lg italic text-center dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="w-8 h-8 text-tertiary-100">
                                <path d="M232,246.857V16H16V416H54.4ZM48,48H200V233.143L48,377.905Z"></path>
                                <path d="M280,416h38.4L496,246.857V16H280ZM312,48H464V233.143L312,377.905Z"></path>
                            </svg>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus quibusdam, eligendi
                            exercitationem molestias possimus facere.
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="absolute right-0 w-8 h-8 text-tertiary-100">
                                <path d="M280,185.143V416H496V16H457.6ZM464,384H312V198.857L464,54.1Z"></path>
                                <path d="M232,16H193.6L16,185.143V416H232ZM200,384H48V198.857L200,54.1Z"></path>
                            </svg>
                        </p>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center p-8 rounded-b-lg  bg-tertiary-100 dark:text-gray-900">
                        <img src="https://source.unsplash.com/50x50/?portrait?3" alt=""
                            class="w-16 h-16 mb-2 -mt-16 bg-center bg-cover rounded-full">
                        <p class="text-xl font-semibold leading-tight">Distinctio Animi</p>
                        <p class="text-sm uppercase">Aliquam illum</p>
                    </div>
                </div>
            </div>
            <div class="row-start-3 row-end-5 col-start-2">
                <div
                    class="flex flex-col max-w-sm mx-4 my-6 shadow-lg
                border-gray-100 bg-primary-500 text-white
                    dark:border-gray-600 dark:bg-gray-800 rounded-lg">
                    <div class="px-4 py-12 rounded-t-lg sm:px-8 md:px-12 dark:bg-gray-900">
                        <p class="relative px-6 py-1 text-lg italic text-center dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="w-8 h-8 text-tertiary-100">
                                <path d="M232,246.857V16H16V416H54.4ZM48,48H200V233.143L48,377.905Z"></path>
                                <path d="M280,416h38.4L496,246.857V16H280ZM312,48H464V233.143L312,377.905Z"></path>
                            </svg>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus quibusdam, eligendi
                            exercitationem molestias possimus facere.
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="absolute right-0 w-8 h-8 text-tertiary-100">
                                <path d="M280,185.143V416H496V16H457.6ZM464,384H312V198.857L464,54.1Z"></path>
                                <path d="M232,16H193.6L16,185.143V416H232ZM200,384H48V198.857L200,54.1Z"></path>
                            </svg>
                        </p>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center p-8 rounded-b-lg bg-tertiary-100 dark:text-gray-900">
                        <img src="https://source.unsplash.com/50x50/?portrait?4" alt=""
                            class="w-16 h-16 mb-2 -mt-16 bg-center bg-cover rounded-full">
                        <p class="text-xl font-semibold leading-tight">Distinctio Animi</p>
                        <p class="text-sm uppercase">Aliquam illum</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
