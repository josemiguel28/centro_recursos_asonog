<?php

namespace Controller\admin\documentos;

use Clases\Request;
use Intervention\Image\ImageManagerStatic as Image;
use MVC\models\Documentos;
use MVC\models\DocumentosResponsable;
use MVC\models\DocumentosTecnicos;
use MVC\models\Tecnicos;
use MVC\models\Tematicas;
use MVC\models\TipoHerramienta;
use MVC\Router;

class CreateDocumentController
{
    const MAX_IMAGE_SIZE = 2 * 1024 * 1024; // 2MB
    const MAX_PDF_SIZE = 10 * 1024 * 1024; // 10MB
    const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png'];
    const ALLOWED_PDF_TYPE = 'application/pdf';

    public static function createDocument($args): void
    {
        $documento = new Documentos();
        $documento->sincronizar($args);

        // Procesar archivos
        $imagenValida = self::procesarImagen($documento);
        $pdfValido = self::procesarPDF($documento);

        if ($imagenValida && $pdfValido) {

            try {
                $resultado = $documento->guardar();
                $documentoId = $resultado['id']; // Obtener el id del documento creado

                self::saveDocumentoTecnicoResponsable($documentoId); // Guardar los tecnicos responsables en la tabla documentos_tecnicos

                Documentos::setAlerta('success', 'Documento creado correctamente.');
                $documento = new Documentos(); // Limpiar el formulario
            } catch (\Exception $e) {
                Documentos::setAlerta('fail', 'Error al crear el documento.');
            }
        } else {
            Documentos::getAlertas();
        }


        $alertas = Documentos::getAlertas();
    }

    private static function crearCarpetaSiNoExiste($carpeta): void
    {
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
    }

    private static function generarNombreArchivo($extension): string
    {
        return md5(uniqid(strval(rand()), true)) . '.' . $extension;
    }

    public static function procesarImagen($documento): bool
    {
        if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            Documentos::setAlerta('fail', 'Error al subir la imagen.');
            return false;
        }

        $tipoImagen = mime_content_type($_FILES['imagen']['tmp_name']);
        $imageSize = $_FILES['imagen']['size'];

        if (!in_array($tipoImagen, self::ALLOWED_IMAGE_TYPES)) {
            Documentos::setAlerta('fail', 'La imagen debe ser un archivo JPG o PNG.');
            return false;
        }

        if ($imageSize > self::MAX_IMAGE_SIZE) {
            Documentos::setAlerta('fail', 'El tamaño de la imagen debe ser menor a 2 MB.');
            return false;
        }

        $nombreImagen = self::generarNombreArchivo('jpg');
        self::crearCarpetaSiNoExiste(CARPETA_IMAGENES_DOCUMENTOS);

        // Procesar la imagen
        try {
            ini_set('memory_limit', '256M'); // Aumentar temporalmente el límite de memoria
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 1200);
            $documento->setFileName($nombreImagen, "imagen");
            $image->save(CARPETA_IMAGENES_DOCUMENTOS . $nombreImagen);
        } catch (Exception $e) {
            Documentos::setAlerta('fail', 'Error al procesar la imagen.');
            return false;
        }

        return true;
    }

    public static function procesarPDF($documento): bool
    {
        if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
            Documentos::setAlerta('fail', 'Error al subir el archivo PDF.');
            return false;
        }

        $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
        $pdfSize = $_FILES['archivo']['size'];

        if ($tipoPDF !== self::ALLOWED_PDF_TYPE) {
            Documentos::setAlerta('fail', 'El archivo debe ser un PDF.');
            return false;
        }

        if ($pdfSize > self::MAX_PDF_SIZE) {
            Documentos::setAlerta('fail', 'El tamaño del archivo debe ser menor a 10 MB.');
            return false;
        }

        $nombrepdf = self::generarNombreArchivo('pdf');
        self::crearCarpetaSiNoExiste(CARPETA_DOCUMENTOS);

        // Mover el archivo PDF al servidor
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], CARPETA_DOCUMENTOS . $nombrepdf)) {
            Documentos::setAlerta('fail', 'Ocurrió un error al subir el archivo PDF.');
            return false;
        }

        $documento->setFileName($nombrepdf, "archivo");
        return true;
    }

    public static function saveDocumentoTecnicoResponsable($documentoId): void
    {
        $request = new Request();

        //obtiene el id de los tecnicos seleccionados
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