<?php

namespace Controller\admin\documentos;

use Clases\FileHandler;
use Clases\Request;
use MVC\models\Documentos;
use MVC\models\DocumentosResponsable;

class CreateDocumentController
{

    /**
     * Crea un nuevo documento con los argumentos proporcionados.
     *
     * Este metodo sincroniza el documento con los argumentos proporcionados, procesa los archivos de imagen y PDF,
     * y guarda el documento junto con sus técnicos responsables. También establece alertas apropiadas según el resultado.
     *
     * @param array $args Los argumentos para sincronizar con el documento.
     * @return void
     */
    public static function createDocument($args)
    {
        $documento = new Documentos();
        $documento->sincronizar($args);

        // Procesar imagen
        $imagenValida = FileHandler::procesarImagen($documento, CARPETA_IMAGENES_DOCUMENTOS);

        // PDF fue pre-subido vía AJAX; sólo se recibe el nombre del archivo
        $pdfFilename = trim($args['pdf_filename'] ?? '');
        if (empty($pdfFilename)) {
            Documentos::setAlerta('fail', 'Debes subir un archivo PDF.');
            $pdfValido = false;
        } else {
            $documento->archivo_url = $pdfFilename;
            $pdfValido = true;
        }

        if ($imagenValida && $pdfValido) {

            try {
                $resultado = $documento->guardar();
                $documentoId = $resultado['id']; // Obtener el id del documento creado

                self::saveDocumentoTecnicoResponsable($documentoId); // Guardar los tecnicos responsables en la tabla documentos_tecnicos

                setFlashAlerta('success', 'Documento creado correctamente.');
                header('Location: /repositorio/gestinar');
                exit;

            } catch (\Exception $e) {
                Documentos::setAlerta('fail', 'Error al crear el documento.');
            }
        } else {
            Documentos::getAlertas();
        }
    }

/**
 * Guarda los técnicos responsables para un documento específico.
 *
 * Este metodo obtiene los IDs de los técnicos responsables seleccionados desde la solicitud ,
 * y guarda cada uno de ellos en la base de datos asociándolos con el documento proporcionado.
 *
 * @param int $documentoId El ID del documento para el cual se guardarán los técnicos responsables.
 * @return void
 */
public static function saveDocumentoTecnicoResponsable($documentoId): void
{
    $request = new Request();

    // Obtiene el ID de los técnicos seleccionados
    $tecnicosId = $request->post('id_tecnico_responsable');

    foreach ($tecnicosId as $tecnicoId) {
        $args = [
            "id_documento" => $documentoId,
            "id_tecnico_responsable" => $tecnicoId
        ];
        $documentoTecnico = new DocumentosResponsable($args);
        $documentoTecnico->guardar();
    }
}
}