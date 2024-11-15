<section class="w-full mx-auto">

    <a href="/gestionar/libros" class="text-lg">&larr; Volver</a>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 mb-8 md:text-2xl">
            <?= $title ?> un libro
        </h1>

        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <?php
                include_once __DIR__ . "/../../templates/alertas.php";
                ?>

                <form class="space-y-4 md:space-y-6" action="/libro?mode=<?= $mode ?>&id= <?= $libro->id ?>"
                      method="post"
                      enctype="multipart/form-data">
                    <div>
                        <label for="nombreLibro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título
                            del libro </label>
                        <input
                                type="text"
                                name="titulo"
                                id="titulo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                                focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Recursos de la vida"
                                required=""
                                value="<?= $libro->titulo; ?>"
                            <?= $mode === "DSP" || $mode === "DEL" ? "disabled" : ""; ?>
                        >
                    </div>

                    <div>
                        <label for="autorLibro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor
                            del libro</label>
                        <input
                                type="text"
                                name="autor"
                                id="autor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Carlos"
                                value="<?= $libro->autor; ?>"
                                required
                            <?= $mode === "DSP" || $mode === "DEL" ? "disabled" : ""; ?>

                        >
                    </div>

                    <div>
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría
                            del libro</label>

                        <select
                            <?= $mode === "DSP" || $mode === "DEL" ? "disabled" : ""; ?>
                                name="id_categoria"
                                id="id_categoria"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">

                            <?php foreach ($categorias as $categoria) : ?>

                                <option value="<?= $categoria->id_categoria ?>"
                                    <?= ($libro->id_categoria == $categoria->id_categoria) ? 'selected' : "" ?> >
                                    <?= $categoria->nombre ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona
                            el estado</label>

                        <select
                            <?= $mode === "DSP" || $mode === "DEL" ? "disabled" : ""; ?>
                                name="estado"
                                id="estado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">

                            <option value="ACT" <?= $libro->estado === "ACT" ? 'selected' : "" ?> >Activo</option>
                            <option value="INA" <?= $libro->estado === "INA" ? 'selected' : "" ?> >Inactivo</option>

                        </select>
                    </div>

                    <?php if ($mode === "UPD" || $mode === "INS") : ?>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagen">Imagen
                                del libro</label>

                            <?php if ($mode === "UPD") : ?>
                                <div class="mb-5 flex justify-center">

                                    <div>
                                        <a href="/libros/<?= $libro->archivo_url; ?>" target="_blank"
                                           class="text-primary-500">

                                            <div>
                                                <img class="rounded-[0.5rem]"
                                                     src="/imagenesLibros/<?= $libro->imagen; ?>"
                                                     alt=""
                                                     width="100"
                                                     height="100"
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                   type="file"
                                   name="imagen"
                                   id="imagen"
                                   accept="image/jpeg, image/png"
                                   value="<?= $libro->imagen; ?>"
                                <?= $mode === "DSP" || $mode === "DEL" ? "disabled" : ""; ?>
                            >

                        </div>

                        <div>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                       class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                       id="dropzone">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="file-preview">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click para subir el PDF del libro</span></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                    </div>
                                    <input
                                            id="dropzone-file"
                                            type="file"
                                            class="hidden"
                                            accept=".pdf"
                                            name="archivo"
                                        <?= $mode === "DSP" || $mode === "DEL" ? "disabled" : ""; ?>
                                    />
                                </label>
                            </div>
                        </div>

                    <?php else : ?>

                        <?php
                            include_once __DIR__ . "/../../templates/formularios/show_file.php";
                            mostrarArchivo("libros", $libro->archivo_url, "imagenesLibros", $libro->imagen);
                        ?>

                    <?php endif; ?>

                    <?php include_once __DIR__ . "/../../templates/formularios/button_actions.php"; ?>

                </form>

            </div>
        </div>
    </div>
</section>

<?php
$script = "<script type='module' src='build/js/admin/crear-libro/drag-and-drop.js'></script>";
?>