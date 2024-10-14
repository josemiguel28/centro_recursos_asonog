<?php

namespace Controller\colaborador;

use Clases\Request;
use MVC\Router;

class ColaboradorController
{
    public static function index(Router $router)
    {
        $session = new Request();
        $session->startSession();

        $router->render('colaborador/index');
    }
}