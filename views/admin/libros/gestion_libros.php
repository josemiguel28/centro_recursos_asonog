<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5 md:py-16">

    <a href="/admin" class="text-lg">&larr; Volver</a>

    <div class="px-4 mx-auto max-w-screen-2xl mt-10 lg:px-12">


        <h1 class="font-semibold text-2xl mb-6">Gestión de Libros</h1>

        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

            <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center justify-end md:space-y-3 md:space-x-3 ">
                <a href="/libro?mode=INS">
                    <button type="button"
                            class="flex items-center justify-center px-4 py-2 mb-8 text-sm font-medium text-black rounded-lg bg-yellow-200">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                        </svg>
                        Agregar Nuevo Libro
                    </button>
                </a>
            </div>


            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">Titulo</th>
                        <th scope="col" class="px-4 py-3">Autor</th>
                        <th scope="col" class="px-4 py-3">Categoria</th>
                        <th scope="col" class="px-4 py-3">Estado</th>
                        <th scope="col" class="px-4 py-3"></th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($libros

                    as $libro) : ?>

                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-700 align-center">
                        <td class="w-4 px-4 py-3">
                            <?= $libro->id; ?>
                        </td>
                        <th scope="row"
                            class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="/imagenesLibros/<?= $libro->imagen; ?>" alt="libro imagen"
                                 class="w-auto h-10 mr-3 rounded-[0.2rem]">

                            <span class="truncate max-w-[400px]"> <?= $libro->titulo; ?> </span>

                        </th>
                        <td class="px-4 py-2">
                                    <span class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded text-center">
                                        <?= $libro->autor; ?>
                                    </span>
                        </td>
                        <td class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded">
                            <div class="flex items-center">
                                <?= $libro->id_categoria; //nombre de la categoria  ?>
                            </div>
                        </td>

                        <?php
                        // Define el color del texto basado en el estado del usuario
                        $estadoColor = '';
                        $estadoColor = $libro->estado === "INA" ? 'text-red-500' : 'text-green-500';

                        // Define el texto a mostrar basado en el estado del usuario
                        $estadoTexto = $libro->estado === "INA" ? 'INA' : 'ACT';
                        ?>

                        <td class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded <?= $estadoColor ?>">
                            <div class="flex items-center">
                                <?= $estadoTexto ?>
                            </div>
                        </td>

                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center justify-evenly">

                                <a class="bg-green-200 py-1 px-2 rounded-lg text-green-800"
                                   href="/libro?mode=DSP&id=<?= $libro->id ?>">Ver</a>

                                <a class="bg-yellow-200 py-1 px-2 mx-4 rounded-lg text-yellow-800"
                                   href="/libro?mode=UPD&id=<?= $libro->id ?>">Editar</a>

                                <a class="bg-red-200 py-1 px-2 rounded-lg text-red-800"
                                   href="/libro?mode=DEL&id=<?= $libro->id ?>">Eliminar</a>


                            </div>
                        </td>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
</section>