<?php

namespace Controller\admin\libros;

use Model\ActiveRecord;
use Model\Libros;
use Exception;

class UpdateBookController extends ActiveRecord
{
    /**
     * Actualiza un libro con los argumentos proporcionados.
     *
     * Este metodo sincroniza el libro con los nuevos datos, verifica si hay nuevos archivos de imagen y PDF,
     * y actualiza el registro del libro. Establece una alerta según el resultado.
     *
     * @param array $args Los nuevos datos para el libro.
     * @param Libros $libro El libro a actualizar.
     * @return void
     */
    public static function actualizarLibro($args, $libro): void
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

    /**
     * Verifica si se ha subido una nueva imagen y la procesa.
     *
     * Este metodo procesa la nueva imagen si se ha subido, elimina la imagen antigua,
     * y establece una alerta según el resultado.
     *
     * @param Libros $libro El libro que se está actualizando.
     * @param string $oldImage El nombre del archivo de la imagen antigua.
     * @return bool True si la nueva imagen se procesó correctamente, false en caso contrario.
     */
    private static function checkForNewImage($libro, $oldImage): bool
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

    /**
     * Verifica si se ha subido un nuevo PDF y lo procesa.
     *
     * Este metodo procesa el nuevo PDF si se ha subido, elimina el PDF antiguo,
     * y establece una alerta según el resultado.
     *
     * @param Libros $libro El libro que se está actualizando.
     * @param string $oldPDF El nombre del archivo del PDF antiguo.
     * @return bool True si el nuevo PDF se procesó correctamente, false en caso contrario.
     */
    private static function checkForNewPDF($libro, $oldPDF): bool
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

    /**
     * Elimina un archivo del sistema de archivos.
     *
     * Este metodo elimina el archivo especificado si existe y lanza una excepción si la eliminación falla.
     *
     * @param string $filePath La ruta al archivo a eliminar.
     * @return void
     * @throws Exception Si el archivo no pudo ser eliminado.
     */
    private static function deleteFile($filePath): void
    {
        if ($filePath && file_exists($filePath) && !unlink($filePath)) {
            throw new Exception("Error al eliminar el archivo anterior.");
        }
    }
}