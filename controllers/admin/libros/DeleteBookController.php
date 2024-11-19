<?php

namespace Controller\admin\libros;

use Clases\FileHandler;
use Exception;
use Model\ActiveRecord;
use Model\Libros;

class DeleteBookController extends ActiveRecord
{

    /**
     * Elimina un libro y sus archivos asociados.
     *
     * Este metodo elimina los archivos de imagen y PDF asociados con el libro,
     * y luego elimina el registro del libro. También establece una alerta según el resultado.
     *
     * @param Libros $libro El libro a eliminar.
     * @return void
     * @throws Exception
     */
    public static function eliminarLibro($libro): void
    {
        try {
            //$libro = self::getBookbyIdFromDb($libro['id']);
            FileHandler::deleteFile(CARPETA_IMAGENES_LIBROS . $libro->imagen);
            FileHandler::deleteFile(CARPETA_LIBROS . $libro->archivo_url);
            $libro->eliminar();
            Libros::setAlerta("success", "Libro eliminado correctamente");
        } catch (Exception $e) {
            Libros::setAlerta("fail", "Error al eliminar el libro: " . $e->getMessage());
        }
    }
}