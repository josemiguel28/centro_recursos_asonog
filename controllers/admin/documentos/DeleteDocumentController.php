<?php

namespace Controller\admin\documentos;

use Model\Libros;
use MVC\models\DocumentosResponsable;
use MVC\models\DocumentosTecnicos;

class DeleteDocumentController
{
    public static function eliminarDocumento($documento)
    {
        try {
            //$documento = self::getBookbyIdFromDb($documento['id']);
            $resultado = DocumentosResponsable::deleteRecord($documento->id);

            if($resultado){

                self::deleteFile(CARPETA_IMAGENES_DOCUMENTOS . $documento->imagen);
                self::deleteFile(CARPETA_DOCUMENTOS . $documento->archivo_url);
                $documento->eliminar();
                Libros::setAlerta("success", "Libro eliminado correctamente");
            }

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

    private static function deleteDocumentoTecnicoRecord($documentId){
        $document = DocumentosResponsable::where("id_documento", $documentId);

        return $document;

    }

}