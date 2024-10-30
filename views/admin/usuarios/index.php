<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5 md:py-16">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">

        <h1 class="font-semibold text-2xl mb-6">Gestión de Usuarios</h1>

        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

            <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center justify-end md:space-y-3 md:space-x-3 ">
                <a href="/crear-cuenta">
                    <button type="button"
                            class="flex items-center justify-center px-4 py-2 mb-8 text-sm font-medium text-black rounded-lg">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                        </svg>
                        Agregar Nuevo Usuario
                    </button>
                </a>
            </div>


            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">Correo</th>
                        <th scope="col" class="px-4 py-3">Nombre</th>
                        <th scope="col" class="px-4 py-3">Rol</th>
                        <th scope="col" class="px-4 py-3">Telefono</th>
                        <th scope="col" class="px-4 py-3">Fecha Creacion</th>
                        <th scope="col" class="px-4 py-3">Estado</th>
                        <th scope="col" class="px-4 py-3"></th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($usuarios

                    as $usuario) : ?>
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-700 align-center">
                        <td class="w-4 px-4 py-3">
                            <?= $usuario->id; ?>
                        </td>
                        <th scope="row"
                            class="flex items-center px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                            <?= $usuario->correo; ?>
                        </th>
                        <td class="px-4 py-2">
                                    <span class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded text-center">
                                        <?= $usuario->nombre; ?>
                                    </span>
                        </td>
                        <td class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded text-center">
                            <div class="flex items-center">
                                <?= $usuario->rol; ?>
                            </div>
                        </td>
                        <td class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded text-center">
                            <?= $usuario->telefono; ?>
                        </td>
                        <td class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded text-center">
                            <?= $usuario->token; ?>
                        </td>


                        <td class="bg-primary-100 text-primary-800 font-medium px-2 py-0.5 rounded
                                <?php
                        if ($usuario->estado === "ACT") {
                            echo 'text-green-500';
                        } else if ($usuario->estado === "INA") {
                            echo 'text-red-500';
                        } else if($usuario->confirmado == 0) {
                            echo 'text-black-500';
                        }

                        ?>">

                            <div class="flex items-center">

                                <?php
                                if ($usuario->confirmado == 0) {
                                    echo 'Usuario no confirmado';
                                } else {
                                    echo $usuario->estado === "INA" ? 'INA' : "ACT";
                                }
                                ?>
                            </div>
                        </td>

                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center justify-evenly">
                                <a class="bg-yellow-200 py-1 px-2 rounded-lg text-yellow-800"
                                   href="/usuario?mode=UPD&id=<?= $usuario->id ?>">Editar</a>


                                <a class="bg-green-200 py-1 px-2 rounded-lg text-green-800"
                                   href="index.php?page=Admin_Formulario&mode=DSP&id={{servicioId}}">Ver</a>


                                <a class="bg-red-200 py-1 px-2 rounded-lg text-red-800"
                                   href="/usuario?mode=DEL&id=<?= $usuario->id ?>">Eliminar</a>


                            </div>
                        </td>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
</section>