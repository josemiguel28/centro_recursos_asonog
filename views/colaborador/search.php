<div class="px-4">

    <h1 class="text-center font-semibold text-3xl mb-14">Repositorio</h1>

    <!-- Barra de búsqueda -->
    <div class="w-full mx-auto mb-20">
        <form class="flex items-center max-w-100 mb-6 md:mb-0 md:w-1/2 mx-auto" method="get" action="/search-document">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                        aria-hidden="true" viewBox="0 0 256 256">
                        <path fill="#999999"
                            d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8m-8 160H72a31.8 31.8 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z" />
                    </svg>
                </div>
                <input type="text" id="simple-search" name="busqueda-recurso"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 lg:text-lg lg:p-4"
                    placeholder="Busca un recurso..." required />
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

    <!-- Contenedor de dos columnas -->
    <div class="grid grid-cols-1 md:grid-cols-1 gap-8 items-start">
        <!-- Columna con filtros (ocupa 1/3) -->

        <div class="md:col-span-2">
            <div class="p-6 contenedor">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 contenedor-documentos">

                    <?php
                    $idCita = 0;

                    foreach ($documentos as $documento) {
                        if ($idCita != $documento->id) {

                    ?>
                            <div class="w-full mb-7 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between">
                                <a href="/documentos/<?= $documento->archivo_url ?>" class="flex justify-center">

                                        <img class="p-8 rounded-t-lg" loading="lazy" src="/imagenesDocumentos/<?= $documento->imagen ?>"
                                            alt="hero img">

                                </a>
                                <div class="flex flex-col justify-between h-full px-5 pb-5">
                                    <a href="/documentos/<?= $documento->archivo_url ?>">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            <?= $documento->nombre_herramienta ?>
                                        </h5>
                                    </a>

                                    <div class="flex items-center mt-2.5 gap-5">

                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <span class="text-gray-400"><?= $documento->fecha_emision ?></span>
                                        </div>

                                        <div class="flex items-start space-x-1 rtl:space-x-reverse px-2.5 py-1 rounded-[1rem] bg-secondary-500">
                                            <p class="text-sm text-white"><?= $documento->tipo_herramienta ?></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="flex items-center justify-end px-5 pb-5">
                                    <a href="/documentos/<?= $documento->archivo_url ?>"
                                        class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver
                                        recurso</a>
                                </div>
                            </div>

                    <?php
                        } // fin if

                        //echo "<h5 class='text-xl font-semibold tracking-tight text-gray-900 dark:text-white'>" . $documento->tecnico . "</h5>";
                        $idCita = $documento->id;
                    } // fin foreach

                    ?>

                </div>

            </div>

            <div class="flex justify-start mt-6">
                <a href="/colaborador">
                    <button id="mostrar-mas-btn" type="button"
                        class="border-gray-700 text-black text-lg">
                        &larr; Volver al repositorio
                    </button>
                </a>
            </div>
        </div>
    </div>