<?php
function mostrarArchivo($pdf_carpeta, $pdf_url, $img_carpeta, $img_url)
{
    ?>
    <div class="mb-5 flex justify-center">
        <div>
            <!-- Link al archivo del libro -->
            <a href="/<?= $pdf_carpeta ?>/<?= $pdf_url; ?>" target="_blank" class="text-primary-500">
                <div>
                    <!-- Imagen del libro -->
                    <img class="rounded-[0.5rem]" src="/<?= $img_carpeta ?>/<?= $img_url; ?>"
                         alt="img" width="100" height="100">
                </div>
            </a>

            <!-- Botón para ver el libro -->
            <div class="px-2 py-4 bg-primary-500 mt-4 rounded-[0.5rem] hover:bg-primary-300">
                <a href="/<?= $pdf_carpeta ?>/<?= $pdf_url; ?>" target="_blank"
                   class="font-semibold text-center block">
                    <p class="text-xs text-white">Ver Libro</p>
                </a>
            </div>
        </div>
    </div>
    <?php
}

?>