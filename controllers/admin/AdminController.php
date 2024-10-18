<?php

namespace Controller\admin;

use Clases\Request;
use MVC\Router;

class AdminController
{
    public static function index(Router $router): void
    {

        $session = new Request();
        $session->startSession();

        $router->render('admin/index');
    }
}