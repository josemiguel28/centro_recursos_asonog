<?php

namespace Controller\admin\documentos;

use MVC\models\Documentos;
use MVC\models\DocumentosResponsable;

class DeleteDocumentController
{
    /**
     * Elimina un documento y sus archivos asociados.
     *
     * Este metodo elimina el registro del documento responsable, los archivos de imagen y PDF asociados,
     * y finalmente elimina el registro del documento. También establece una alerta según el resultado.
     *
     * @param Documentos $documento El documento a eliminar.
     * @return void
     */
    public static function eliminarDocumento($documento)
    {
        try {
            $resultado = DocumentosResponsable::deleteRecord($documento->id);

            if ($resultado) {
                self::deleteFile(CARPETA_IMAGENES_DOCUMENTOS . $documento->imagen);
                self::deleteFile(CARPETA_DOCUMENTOS . $documento->archivo_url);
                $documento->eliminar();
                Documentos::setAlerta("success", "Libro eliminado correctamente");
            }

        } catch (Exception $e) {
            Documentos::setAlerta("fail", "Error al eliminar el libro: " . $e->getMessage());
        }
    }

    private static function deleteFile($filePath): void
    {
        if ($filePath && file_exists($filePath) && !unlink($filePath)) {
            throw new Exception("Error al eliminar el archivo anterior.");
        }
    }
}