<?php

namespace Controller\admin\documentos;

use Clases\Request;
use Controller\admin\libros\UpdateBookController;
use Model\ActiveRecord;
use Model\Libros;
use MVC\models\Documentos;
use MVC\models\DocumentosTecnicos;
use MVC\models\Tecnicos;
use MVC\models\Tematicas;
use MVC\models\TipoHerramienta;
use MVC\Router;

class ManageDocumentsController extends ActiveRecord
{
    public static function showDocuments(Router $router)
    {
        $documents = DocumentosTecnicos::getAllDocumentos();
        $router->render('admin/documentos/gestion_documentos',
            [
                'documentos' => $documents
            ]);
    }

    public static function gestionarDocumento(Router $router): void
    {

        $request = new Request();
        $formAction = $request->get('mode');
        $getDocumentIdFromUrl = intval($request->get('id'));
        $formTitle = setFormTitle($formAction);

        $tipoHerramientas = TipoHerramienta::getAllHerramientas();
        $tematicas = Tematicas::getAllTematicas();
        $tecnicoResponsable = Tecnicos::getAllTecnicos();

        if (is_int($getDocumentIdFromUrl)) {
            $document = self::getDocumentByIdFromDb($getDocumentIdFromUrl);
            $documentData = self::prepareViewDataDocument($document);
            $documento = Documentos::where("id", $getDocumentIdFromUrl);
        }


        if (isPostBack()) {
            switch ($formAction) {
                case 'INS':
                    CreateDocumentController::createDocument($_POST);
                    break;
                case 'UPD':
                    UpdateDocumentController::actualizarDocumento($_POST, $documento);
                    break;
                case 'DEL':
                    DeleteDocumentController::eliminarDocumento($documento);
                    break;
            }
        }

        $alertas = Libros::getAlertas();

        $router->render('admin/documentos/formulario_documentos',
            [
                'title' => $formTitle,
                'tipoHerramientas' => $tipoHerramientas,
                'tematicas' => $tematicas,
                'tecnicos' => $tecnicoResponsable,
                'mode' => $formAction,
                'documento' => $documentData,
                'alertas' => $alertas
            ]

        );
    }

    private static function getDocumentByIdFromDb($id)
    {
        return DocumentosTecnicos::getDocumentById($id);
    }

    private static function prepareViewDataDocument($document): array
    {
        $documentData = [];

        foreach ($document as $doc) {
            foreach ($doc as $key => $val) {
                // Si la clave es 'id_tecnico', almacena los valores en un array
                if ($key === 'tecnico') {
                    // Inicializa como array si aún no existe
                    if (!isset($documentData[$key])) {
                        $documentData[$key] = [];
                    }
                    // Agrega el valor si no está ya en el array
                    if (!in_array($val, $documentData[$key])) {
                        $documentData[$key][] = $val;
                    }
                } else {
                    // Para otras claves, simplemente asigna el valor
                    $documentData[$key] = $val;
                }
            }
        }
        return $documentData;
    }


}