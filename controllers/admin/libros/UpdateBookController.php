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
            //guarda el nombre antes que se sinconice con los nuevos nombres
            $oldImage = $libro->imagen;
            $oldPDF = $libro->archivo_url;

            $libro->sincronizar($args);

            if (self::checkForNewImage($libro, $oldImage) && self::checkForNewPDF($libro, $oldPDF)) {
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
                self::deleteFile(CARPETA_IMAGENES_LIBROS . $oldImage);
                return true;
            } else {
                Libros::setAlerta("fail", "Error al procesar la nueva imagen.");
                return false;
            }
        }
        return true;
    }

    private static function checkForNewPDF($libro, $oldPDF)
    {
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            if (CreateBookController::procesarPDF($libro)) {
                self::deleteFile(CARPETA_LIBROS . $oldPDF);
                return true;
            } else {
                Libros::setAlerta("fail", "Error al procesar el nuevo PDF.");
                return false;
            }
        }
        return true;
    }

    private static function deleteFile($filePath): void
    {
        if ($filePath && file_exists($filePath) && !unlink($filePath)) {
            throw new Exception("Error al eliminar el archivo anterior.");
        }
    }
}