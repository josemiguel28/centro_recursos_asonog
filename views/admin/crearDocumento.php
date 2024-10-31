<section class="w-full mx-auto">

    <a href="/admin" class="underline text-lg">&larr; Volver</a>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 mb-8 md:text-2xl">
            Crear un nuevo documento
        </h1>

        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <?php
                include_once __DIR__ . "/../templates/alertas.php";
                ?>

                <form class="space-y-4 md:space-y-6" action="/crear-documento" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="nombreHerramienta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa el nombre de la herramienta <span class="text-red-500">*</span> </label>
                        <input
                            type="text"
                            name="nombre_herramienta"
                            id="nombreHerramienta"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                        focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Recursos de la vida"
                            required=""
                            value="<?= $documento->nombre; ?>">
                    </div>

                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona el tipo de herramienta</label>
                        <select
                            id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="id_tipo_herramienta">

                            <?php foreach ($tipoHerramientas as $herramienta): ?>
                                <option value="<?= $herramienta->id ?>"><?= $herramienta->nombre ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la tematica de la herramienta</label>
                        <select
                            id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="id_tematica">

                            <?php foreach ($tematicas as $tematica): ?>
                                <option value="<?= $tematica->id ?>"><?= $tematica->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                   
                        <label for="tecnico" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona los técnicos responsables</label>
                        <div id="tecnicosResponsables" class="grid grid-cols-1 sm:grid-cols-2 gap-2 w-full border">

                            <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-black w-full min-w-full" type="button">
                                Técnicos
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60">

                                <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">

                                    <?php foreach ($tecnicos as $responsable): ?>
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="checkbox-item-<?= $responsable->id ?>" type="checkbox" value="<?= $responsable->id ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" name="id_tecnico_responsable[]">
                                                <label for="checkbox-item-<?= $responsable->id ?>" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?= $responsable->nombre ?></label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    <div>
                        <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de publicacion<span class="text-red-500">*</span> </label>
                        <input
                            type="text"
                            name="fecha_emision"
                            id="fecha"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                        focus:border-primary-600 block w-full p-2.5 "
                            placeholder="2024"
                            required=""
                            value="<?= $documento->fecha; ?>">
                    </div>


                    <div>

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 "
                            placeholder="Escribe una descripcion del documento..."
                            name="descripcion"></textarea>

                    </div>


                    <div>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-image"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                id="dropzoneimage">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6" id="file-preview-image">


                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                            <circle cx="9" cy="9" r="2" />
                                            <path d="m21 15l-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                        </g>
                                    </svg>

                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para subir una imagen</span></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400"></p>
                                </div>
                                <input id="dropzone-image" type="file" class="hidden" accept=".jpg, .png" name="imagen" required />
                            </label>
                        </div>
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
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para subir el archivo PDF</span></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400"></p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" accept=".pdf" name="archivo" required />
                            </label>
                        </div>
                    </div>

                    <div class="bg-primary-500 hover:bg-primary-300 font-medium rounded-lg">
                        <button type="submit"
                            class="w-full text-white text-sm px-5 py-2.5 text-center ">
                            Crear nuevo documento
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