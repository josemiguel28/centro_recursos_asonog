<?php

namespace Controller\colaborador;

use MVC\models\DocumentosTecnicos;
use MVC\Router;

class SearchDocumentController
{
    public static function searchDocument(Router $router): void
    {
        $search = sanitizar($_GET['busqueda-recurso']) ?? '';
        //$search = filter_var($search, FILTER_SANITIZE_STRING);

        $documentos = DocumentosTecnicos::searchDocument($search);

        $router->render('colaborador/search',
            [
                'documentos' => $documentos,
                'search' => $search
            ]
        );
    }
}