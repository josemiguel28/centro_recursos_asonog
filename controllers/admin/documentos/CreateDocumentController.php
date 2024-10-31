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

    public static function createDocument(Router $router): void
    {
        $documento = new Documentos();
        $tipoHerramientas = TipoHerramienta::getAllHerramientas();
        $tematicas = Tematicas::getAllTematicas();
        $tecnicoResponsable = Tecnicos::getAllTecnicos();

        if (isPostBack()) {
            $documento->sincronizar($_POST);

            // Procesar archivos
            $imagenValida = self::procesarImagen($documento);
            $pdfValido = self::procesarPDF($documento);

            if ($imagenValida && $pdfValido) {

                try {
                    $resultado = $documento->crear();
                    $documentoId = $resultado['id']; // Obtener el id del documento creado

                    self::saveDocumentoTecnicoResponsable($documentoId); // Guardar los tecnicos responsables en la tabla documentos_tecnicos

                    Documentos::setAlerta('text-green-500 bg-green-100', 'Documento creado correctamente.');
                    $documento = new Documentos(); // Limpiar el formulario
                } catch (\Exception $e) {
                    Documentos::setAlerta('text-red-500 bg-red-100', 'Error al crear el documento.');
                }
            } else {
                Documentos::getAlertas();
            }
        }

        $alertas = Documentos::getAlertas();
        $router->render('admin/crearDocumento', [
            'tipoHerramientas' => $tipoHerramientas,
            'tematicas' => $tematicas,
            'tecnicos' => $tecnicoResponsable,
            'alertas' => $alertas
        ]);
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

    private static function procesarImagen($documento): bool
    {
        if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'Error al subir la imagen.');
            return false;
        }

        $tipoImagen = mime_content_type($_FILES['imagen']['tmp_name']);
        $imageSize = $_FILES['imagen']['size'];

        if (!in_array($tipoImagen, self::ALLOWED_IMAGE_TYPES)) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'La imagen debe ser un archivo JPG o PNG.');
            return false;
        }

        if ($imageSize > self::MAX_IMAGE_SIZE) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'El tamaño de la imagen debe ser menor a 2 MB.');
            return false;
        }

        $nombreImagen = self::generarNombreArchivo('jpg');
        self::crearCarpetaSiNoExiste(CARPETA_IMAGENES_DOCUMENTOS);

        // Procesar la imagen
        try {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 1200);
            $documento->setFileName($nombreImagen, "imagen");
            $image->save(CARPETA_IMAGENES_DOCUMENTOS . $nombreImagen);
        } catch (Exception $e) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'Error al procesar la imagen.');
            return false;
        }

        return true;
    }

    private static function procesarPDF($documento): bool
    {
        if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'Error al subir el archivo PDF.');
            return false;
        }

        $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
        $pdfSize = $_FILES['archivo']['size'];

        if ($tipoPDF !== self::ALLOWED_PDF_TYPE) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'El archivo debe ser un PDF.');
            return false;
        }

        if ($pdfSize > self::MAX_PDF_SIZE) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'El tamaño del archivo debe ser menor a 10 MB.');
            return false;
        }

        $nombrepdf = self::generarNombreArchivo('pdf');
        self::crearCarpetaSiNoExiste(CARPETA_DOCUMENTOS);

        // Mover el archivo PDF al servidor
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], CARPETA_DOCUMENTOS . $nombrepdf)) {
            Documentos::setAlerta('text-red-500 bg-red-100', 'Ocurrió un error al subir el archivo PDF.');
            return false;
        }

        $documento->setFileName($nombrepdf, "archivo");
        return true;
    }

    private static function saveDocumentoTecnicoResponsable($documentoId): void
    {
        $request = new Request();

        //obtiene el id de los tecnicos seleccionados
        $tecnicosId = $request->post('id_tecnico_responsable');

        foreach($tecnicosId as $tecnicoId){
            $args = [
                "id_documento" => $documentoId,
                "id_tecnico_responsable" => $tecnicoId
            ];

            $documentoTecnico = new DocumentosResponsable($args);
            $documentoTecnico->guardar();
        }
    }
}