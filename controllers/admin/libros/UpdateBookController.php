<?php

namespace Controller\admin\libros;

use Model\ActiveRecord;
use Model\Libros;
use Exception;

class UpdateBookController extends ActiveRecord
{
    public static function actualizarLibro($args, $libro)
    {
        try {

            $oldImage = $libro->imagen;

            $libro->sincronizar($args);

            // revisa si se subio una imagen nueva
            $imageProcessed = self::checkForNewImage($libro, $oldImage);

            if ($imageProcessed) {
                $libro->guardar();
                Libros::setAlerta("success", "Libro actualizado correctamente");
            }

        } catch (Exception $e) {
            Libros::setAlerta("fail", "Error al actualizar el libro: " . $e->getMessage());
        }
    }

    private static function checkForNewImage($libro, $oldImage)
    {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            if (CreateBookController::procesarImagen($libro)) {

                // Elimina la imagen anterior del servidor si existe
                if ($oldImage && file_exists(CARPETA_IMAGENES . $oldImage)) {
                    if (!unlink(CARPETA_IMAGENES . $oldImage)) {
                        throw new Exception("Error al eliminar la imagen anterior.");
                    }
                }

                return true;
            } else {
                Libros::setAlerta("fail", "Error al procesar la nueva imagen.");
                return false;
            }
        }

        // No se subió una nueva imagen, retorna verdadero para continuar con la actualización
        return true;
    }
}
