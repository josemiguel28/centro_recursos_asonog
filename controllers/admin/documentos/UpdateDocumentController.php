<?php

namespace Controller\admin\documentos;

use Model\ActiveRecord;
use MVC\models\Documentos;


class UpdateDocumentController extends ActiveRecord
{

    public static function actualizarDocumento($args, $documento)
    {

        try {

            //guarda el nombre antes que se sinconice con los nuevos nombres
            $oldImage = $documento->imagen;
            $oldPDF = $documento->archivo_url;

            $documento->sincronizar($args);

            if (self::checkForNewImage($documento, $oldImage) && self::checkForNewPDF($documento, $oldPDF)) {

                $documento->guardar();
                $documentoId = $documento->id;

                CreateDocumentController::saveDocumentoTecnicoResponsable($documentoId);

                Documentos::setAlerta("success", "Documento actualizado correctamente");
            }
        } catch (Exception $e) {
            Documentos::setAlerta("fail", "Error al actualizar el libro: " . $e->getMessage());
        }
    }

    private static function checkForNewImage($documento, $oldImage)
    {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            if (CreateDocumentController::procesarImagen($documento)) {
                self::deleteFile(CARPETA_IMAGENES_DOCUMENTOS . $oldImage);
                return true;
            } else {
                Documentos::setAlerta("fail", "Error al procesar la nueva imagen.");
                return false;
            }
        }
        return true;
    }

    private static function checkForNewPDF($documento, $oldPDF)
    {
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            if (CreateDocumentController::procesarPDF($documento)) {
                self::deleteFile(CARPETA_DOCUMENTOS . $oldPDF);
                return true;
            } else {
                Documentos::setAlerta("fail", "Error al procesar el nuevo PDF.");
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