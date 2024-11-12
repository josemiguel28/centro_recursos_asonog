<?php

namespace Controller\admin\libros;

use Model\ActiveRecord;
use Model\Libros;

class DeleteBookController extends ActiveRecord
{

    public static function eliminarLibro($libro)
    {
        try {
            //$libro = self::getBookbyIdFromDb($libro['id']);
            self::deleteFile(CARPETA_IMAGENES_LIBROS . $libro->imagen);
            self::deleteFile(CARPETA_LIBROS . $libro->archivo_url);
            $libro->eliminar();
            Libros::setAlerta("success", "Libro eliminado correctamente");
        } catch (Exception $e) {
            Libros::setAlerta("fail", "Error al eliminar el libro: " . $e->getMessage());
        }
    }

    private static function deleteFile($filePath): void
    {
        if ($filePath && file_exists($filePath) && !unlink($filePath)) {
            throw new Exception("Error al eliminar el archivo anterior.");
        }
    }
}