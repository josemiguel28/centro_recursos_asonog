<?php

namespace Controller\biblioteca;

use Clases\Request;
use MVC\Router;
use Model\Libros as ModeloLibros;

class BibliotecaController
{
    public static function index(Router $router): void
    {

        $session = new Request();
        $session->startSession();

        $libros = ModeloLibros::getActiveBooksWithLimit(10);

        $router->render('biblioteca/index',
            [
                'libros' => $libros,
                'categorias' => self::getBookCategories()
                //'offset' => $offset + $limit Para la siguiente página
            ]
        );
    }

    private static function getBookCategories(): array
    {
        return ModeloLibros::getBooksCategories();
    }
}
