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

        $categorias = self::getBookCategories();

        $libros = ModeloLibros::getActiveBooksWithLimit(10);

        $router->render('biblioteca/index',
            [
                'libros' => $libros,
                'categorias' => $categorias,
                'titlePage' => "Biblioteca"
            ]
        );
    }

    private static function getBookCategories(): array
    {
        return LibrosCategorias::getBooksCategories();
    }
}
