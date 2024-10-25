<section class="w-full mx-auto">

    <a href="/admin" class="text-lg">&larr; Volver</a>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 mb-8 md:text-2xl">
            Crear un nuevo libro
        </h1>

        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <?php
                include_once __DIR__ . "/../templates/alertas.php";
                ?>

                <form class="space-y-4 md:space-y-6" action="/crear-libro" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="nombreLibro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa el titulo del libro <span class="text-red-500">*</span> </label>
                        <input
                            type="text"
                            name="titulo"
                            id="titulo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                        focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Recursos de la vida"
                            required=""
                            value="<?= $libro->titulo; ?>">
                    </div>

                    <div>
                        <label for="autorLibro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa el autor del libro</label>
                        <input
                            type="text"
                            name="autor"
                            id="autor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Carlos"
                            value="<?= $libro->autor; ?>"
                            required>
                    </div>

                    <div>
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa la categoria del libro</label>
                        <input
                            type="text"
                            name="categoria"
                            id="categoria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                        focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Derechos humanos"
                            value="<?= $libro->categoria; ?>">
                    </div>

                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona
                            el estado</label>

                        <select name="estado" id="estado" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                           
                                <option value="ACT">Activo</option>
                                <option value="INA">Inactivo</option> 
                           
                        </select>
                    </div>


                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagen">Imagen del libro</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file"
                            name="imagen"
                            id="imagen"
                            accept="image/jpeg, image/png">
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                id="dropzone">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6" id="file-preview">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para subir</span> o
                                        arrastra y suelta</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" accept=".pdf" name="archivo" />
                            </label>
                        </div>
                    </div>

                    <div class="bg-primary-500 hover:bg-primary-300 font-medium rounded-lg">
                        <button type="submit"
                            class="w-full text-white text-sm px-5 py-2.5 text-center ">
                            Crear nuevo libro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php
$script = "<script type='module' src='build/js/admin/crear-libro/drag-and-drop.js'></script>";
?>