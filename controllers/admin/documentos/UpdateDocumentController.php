<?php

namespace Controller\admin\documentos;

use Clases\FileHandler;
use Model\ActiveRecord;
use MVC\models\Documentos;
use MVC\models\DocumentosResponsable;

class UpdateDocumentController extends ActiveRecord
{
    /**
     * Actualiza un documento con los argumentos proporcionados.
     *
     * Este metodo sincroniza el documento con los nuevos argumentos, verifica y procesa
     * las nuevas imágenes y archivos PDF si se proporcionan, guarda el documento actualizado,
     * y guarda el responsable del documento. También establece alertas según el resultado.
     *
     * @param array $args Los nuevos argumentos para sincronizar con el documento.
     * @param Documentos $documento El documento a actualizar.
     * @return void
     */
    public static function actualizarDocumento($args, $documento): void
    {
        try {
            // Guarda la ruta antes de que se sincronice con los nuevos nombres
            $oldImage = $documento->imagen;
            $oldPDF = $documento->archivo_url;

            $documento->sincronizar($args);

            if (self::checkForNewImage($documento, $oldImage) && self::checkForNewPDF($args, $documento, $oldPDF)) {
                $documento->guardar();
                $documentoId = $documento->id;

                // Borra los técnicos anteriores y reinserta los nuevos
                DocumentosResponsable::deleteRecord($documentoId);
                CreateDocumentController::saveDocumentoTecnicoResponsable($documentoId);

                setFlashAlerta("success", "Documento con ID " . $documento->id . " actualizado correctamente.");
                header('Location: /repositorio/gestionar');
                exit;
            }
        } catch (Exception $e) {
            Documentos::setAlerta("fail", "Error al actualizar el libro: " . $e->getMessage());
        }
    }

    private static function checkForNewImage($documento, $oldImage): bool
    {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            if (FileHandler::procesarImagen($documento, CARPETA_IMAGENES_DOCUMENTOS)) {
                FileHandler::deleteFile(CARPETA_IMAGENES_DOCUMENTOS . $oldImage);
                return true;
            } else {
                Documentos::setAlerta("fail", "Error al procesar la nueva imagen.");
                return false;
            }
        }
        return true;
    }

    private static function checkForNewPDF($args, $documento, $oldPDF): bool
    {
        $newFilename = trim($args['pdf_filename'] ?? '');

        if (empty($newFilename)) {
            Documentos::setAlerta("fail", "El PDF del documento no puede estar vacío.");
            return false;
        }

        // Siempre sincronizar el nombre en el modelo
        $documento->archivo_url = $newFilename;

        // Si cambió el archivo, eliminar el anterior
        if ($newFilename !== $oldPDF && !empty($oldPDF)) {
            FileHandler::deleteFile(CARPETA_DOCUMENTOS . $oldPDF);
        }

        return true;
    }
}