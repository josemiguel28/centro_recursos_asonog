<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6 contenedor-documentos">

    <?php
    $idDocumento = 0;

    foreach ($documentos as $documento) {
        if ($idDocumento != $documento->id) {
    ?>
            <div class="w-full mb-7 max-w-sm bg-white flex flex-col justify-between sm:max-w-xs">
                <a href="/documentos/<?= $documento->archivo_url ?>" class="flex justify-center" target="_blank" style="background-color: #FCFCF7;">
                    <img class="p-4 sm:p-8" loading="lazy" src="imagenesDocumentos/<?= $documento->imagen ?>" alt="hero img">
                </a>
                <div class="flex flex-col justify-between h-full px-3 sm:px-5 pb-3 sm:pb-5">
                    <a href="/documentos/<?= $documento->archivo_url ?>" target="_blank">
                        <h5 class="text-lg sm:text-xl font-semibold tracking-tight text-gray-900 dark:text-white truncate">
                            <?= $documento->nombre_herramienta ?>
                        </h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-4 sm:mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <div class="flex items-center space-x-1 px-2 rtl:space-x-reverse">
                                <span class="text-gray-400"> <?= $documento->fecha_emision ?></span>
                            </div>

                            <div class="flex items-start space-x-1 rtl:space-x-reverse px-2 py-1 rounded-[1rem] bg-secondary-500">
                                <p class="text-xs sm:text-sm text-white max-w-[150px] truncate"><?= $documento->tipo_herramienta ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-3 sm:px-5 pb-3 sm:pb-5">
                    <a href="/documentos/<?= $documento->archivo_url ?>" target="_blank"
                        class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs sm:text-lg px-4 py-2 sm:px-5 sm:py-2.5 text-center w-full">
                        Ver recurso
                    </a>
                </div>
            </div>
    <?php
        } // fin if

        $idDocumento = $documento->id;
    } // fin foreach
    ?>

</div>