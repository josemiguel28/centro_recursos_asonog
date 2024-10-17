<?php

namespace Controller\colaborador;

use Clases\Request;
use MVC\models\Documentos;
use MVC\models\DocumentosTecnicos;
use MVC\Router;
use MVC\Models\TipoHerramienta;
use MVC\Models\Tematicas;

class ColaboradorController
{
    public static function index(Router $router)
    {
        $session = new Request();
        $session->startSession();

        $tipos_herramienta = TipoHerramienta::getAllHerramientas();
        $tematicas = Tematicas::getAllTematicas();
        $documentos = DocumentosTecnicos::getAllDocumentos();

        $router->render('colaborador/index',
            [
                'documentos' => $documentos,
                'tipos_herramienta' => $tipos_herramienta,
                'tematicas' => $tematicas
            ]
        );
    }
}