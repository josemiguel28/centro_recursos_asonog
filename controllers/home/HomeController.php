<?php

namespace Controller\home;

use MVC\Router;

class HomeController
{
    public static function index(Router $router)
    {
        $router->render('home/index');
    }
}