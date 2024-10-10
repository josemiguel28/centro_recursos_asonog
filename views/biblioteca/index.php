<div class="px-4">

    <h1 class="text-center font-semibold text-3xl mb-14">Biblioteca</h1>

    <!-- Barra de búsqueda -->
    <div class="w-full mx-auto mb-20">
        <form class="flex items-center max-w-100 mb-6 md:mb-0 md:w-1/2 mx-auto" method="get" action="/search">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                         aria-hidden="true" viewBox="0 0 256 256">
                        <path fill="#999999"
                              d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8m-8 160H72a31.8 31.8 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z"/>
                    </svg>
                </div>
                <input type="text" id="simple-search" name="busqueda-libro"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 lg:text-lg lg:p-4"
                       placeholder="Busca un libro..." required/>
            </div>

            <div class="bg-primary-500 rounded-lg hover:bg-primary-300 mx-2">

                <button type="submit"
                        class="ms-auto p-2.5 text-sm font-medium text-white focus:ring-4 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Buscar</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Contenedor de dos columnas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
        <!-- Columna con filtros (ocupa 1/3) -->
        <div class="md:col-span-1">
            <div class="p-4">
                <h1 class="font-semibold text-lg mb-6">Filtros</h1>

                <!-- Primer filtro -->
                <button id="toggleFilters1" class="w-full flex justify-between items-center p-2 lg:w-10/12">
                    Categoria
                    <svg id="arrowIcon1" class="w-4 h-4 text-gray-600 transition-transform transform"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div id="filtersContent1" class="hidden mt-2 space-y-2 transition-opacity duration-500 ease-in-out">
                    <div>
                        <label class="flex items-center">
                            <input type="radio" name="filtro1" value="opcion1" class="mr-2">
                            Opción 1
                        </label>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="radio" name="filtro1" value="opcion2" class="mr-2">
                            Opción 2
                        </label>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="radio" name="filtro1" value="opcion3" class="mr-2">
                            Opción 3
                        </label>
                    </div>
                </div>

                <!-- Segundo filtro -->
                <div class="mt-4">
                    <button id="toggleFilters2" class="w-full flex justify-between items-center p-2 lg:w-10/12">
                        Año
                        <svg id="arrowIcon2" class="w-4 h-4 text-gray-600 transition-transform transform"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div id="filtersContent2" class="hidden mt-2 space-y-2 transition-opacity duration-500 ease-in-out">
                        <div>
                            <label class="flex items-center">
                                <input type="radio" name="filtro2" value="opcion1" class="mr-2">
                                Opción 1
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="radio" name="filtro2" value="opcion2" class="mr-2">
                                Opción 2
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="radio" name="filtro2" value="opcion3" class="mr-2">
                                Opción 3
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="p-6 contenedor">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 contenedor-libros">

                    <?php foreach ($libros as $libro) : ?>
                        <div class="w-full mb-7 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between">
                            <a href="#" class="flex justify-center">
                                <picture>
                                    <source srcset="build/img/img.webp" type="image/webp">
                                    <source srcset="build/img/img.jpg" type="image/jpeg">
                                    <img class="p-8 rounded-t-lg" loading="lazy" src="build/img/img.png" alt="hero img">
                                </picture>
                            </a>
                            <div class="px-5 pb-5 flex-grow">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $libro->titulo ?></h5>
                                </a>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                        <!-- SVG estrellas -->
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    </div>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-5 pb-5">
                                <a href="/libros/ver?id=<?php echo $libro->id ?>"
                                   class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver
                                    Libro</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Botón de ver más -->
                <div class="flex justify-center mt-6"
                ">
                <button id="mostrar-mas-btn" type="button"
                        class="border-2 border-gray-700 text-black px-6 py-3 rounded-md text-lg hover:bg-blue-700 transition">
                    Ver más
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    // Función para manejar los filtros desplegables
    function toggleFilter(toggleButtonId, contentId, arrowIconId) {
        const toggleButton = document.getElementById(toggleButtonId);
        const filtersContent = document.getElementById(contentId);
        const arrowIcon = document.getElementById(arrowIconId);

        toggleButton.addEventListener('click', () => {
            filtersContent.classList.toggle('hidden');
            arrowIcon.classList.toggle('rotate-180');
        });
    }

    // Inicializa los filtros
    toggleFilter('toggleFilters1', 'filtersContent1', 'arrowIcon1');
    toggleFilter('toggleFilters2', 'filtersContent2', 'arrowIcon2');
</script>

<?php
$script = "<script type='module' src='build/js/app.js'></script>";
?>
