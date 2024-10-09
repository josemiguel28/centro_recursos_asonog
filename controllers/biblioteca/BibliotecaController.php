<?php

namespace Controller\biblioteca;

use MVC\Router;
use Model\Libros as ModeloLibros;

class BibliotecaController
{
    public static function index(Router $router): void
    {
        $libros = ModeloLibros::getAllActiveBooks();

        $router->render('biblioteca/index',
            [
                'libros' => $libros
            ]
        );
    }
}
