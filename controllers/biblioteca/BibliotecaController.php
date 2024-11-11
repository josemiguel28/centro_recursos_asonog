<?php

namespace Controller\biblioteca;

use Clases\Request;
use MVC\models\LibrosCategorias;
use MVC\Router;
use Model\Libros as ModeloLibros;

class BibliotecaController
{
    public static function index(Router $router): void
    {

        $session = new Request();
        $session->startSession();

        $categorias = self::getBookCategories();

        $libros = ModeloLibros::getActiveBooksWithLimit(10);

        $router->render('biblioteca/index',
            [
                'libros' => $libros,
                'categorias' => $categorias
                //'offset' => $offset + $limit Para la siguiente página
            ]
        );
    }

    private static function getBookCategories(): array
    {
        return LibrosCategorias::getBooksCategories();
    }
}
