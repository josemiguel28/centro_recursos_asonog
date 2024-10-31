<?php

namespace Controller\admin;

use Clases\Request;
use MVC\models\Documentos;
use MVC\Router;

class AdminController
{
    public static function index(Router $router): void
    {

        $session = new Request();
        $session->startSession();

        $crrntUser = $_SESSION['nombre'] ?? "";

        $totalDocuments = self::showTotalDocuments();

        $router->render('admin/index',
            [
                'crrntUser' => $crrntUser,
                'totalDocumentos' => $totalDocuments
            ]
        );
    }
    private static function showTotalDocuments()
    {
        $totalDocuments = Documentos::getTotalDocuments();
        return count($totalDocuments);

    }
}