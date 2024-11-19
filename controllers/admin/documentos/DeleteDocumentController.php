<?php

namespace Controller\admin\documentos;

use Clases\FileHandler;
use Exception;
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
     * @throws Exception
     */
    public static function eliminarDocumento($documento): void
    {
        try {
            $resultado = DocumentosResponsable::deleteRecord($documento->id);

            if ($resultado) {
                FileHandler::deleteFile(CARPETA_IMAGENES_DOCUMENTOS . $documento->imagen);
                FileHandler::deleteFile(CARPETA_DOCUMENTOS . $documento->archivo_url);
                $documento->eliminar();
                Documentos::setAlerta("success", "Libro eliminado correctamente");
            }

        } catch (Exception $e) {
            Documentos::setAlerta("fail", "Error al eliminar el libro: " . $e->getMessage());
        }
    }
}