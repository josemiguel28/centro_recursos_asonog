<?php

namespace Controller\admin\documentos;

use Clases\Request;
use Model\ActiveRecord;
use Model\Libros;
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

    public static function gestionarDocumento(Router $router)
    {

        $request = new Request();
        $formAction = $request->get('mode');
        $getDocumentIdFromUrl = $request->get('id');
        $formTitle = setFormTitle($formAction);

        $tipoHerramientas = TipoHerramienta::getAllHerramientas();
        $tematicas = Tematicas::getAllTematicas();
        $tecnicoResponsable = Tecnicos::getAllTecnicos();

        $document = self::getDocumentByIdFromDb($getDocumentIdFromUrl);

        if (isPostBack()) {
            switch ($formAction) {
                case 'INS':
                  CreateDocumentController::createDocument($_POST);
                    break;
                case 'UPD':
                    UpdateBookController::actualizarLibro($_POST, $book);
                    break;
                case 'DEL':
                    DeleteBookController::eliminarLibro($book);
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
                'documento' => $document,
                'alertas' => $alertas
            ]

        );
    }

    private static function getDocumentByIdFromDb($id){
        return DocumentosTecnicos::getDocumentById($id);
    }

}