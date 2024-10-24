<div class="px-4">

    <h1 class="text-center font-semibold text-3xl mb-14">Biblioteca</h1>

    <div class="w-full mx-auto mb-20">
        <form class="flex items-center max-w-100 mb-6 md:mb-0 md:w-1/2 mx-auto" method="get" action="/search-book">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                        aria-hidden="true" viewBox="0 0 256 256">
                        <path fill="#999999"
                            d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8m-8 160H72a31.8 31.8 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z" />
                    </svg>
                </div>
                <input type="text" id="simple-search" name="busqueda-libro"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 lg:text-lg lg:p-4"
                    placeholder="Busca un libro..." required />
            </div>

            <div class="bg-primary-500 rounded-lg hover:bg-primary-300 mx-2">

                <button type="submit"
                    class="ms-auto p-2.5 text-sm font-medium text-white focus:ring-4 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Buscar</span>
                </button>
            </div>
        </form>
    </div>

    <div class="flex justify-start mb-6">
        <h1 class="text-2xl">Resultados de la busqueda <span class="font-semibold"> <?= $search; ?> </span></h1>
    </div>

    <div class="md:col-span-2">
        <div class="p-6 contenedor">

            <?php if (!$libros): ?>

                <div class="w-full mb-7 bg-white flex justify-center">
                    <div class="px-5 pb-5">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">No se encontraron
                            libros</h5>
                    </div>
                </div>

            <?php endif; ?>

            <?php require_once __DIR__ . "/../templates/librosContenedor.php"; ?>


            <div class="flex justify-start mt-6">
                <a href="/biblioteca">
                    <button id="mostrar-mas-btn" type="button"
                        class="border-gray-700 text-black text-lg underline">
                        Volver a la biblioteca
                    </button>
                </a>
            </div>
        </div>

    </div>