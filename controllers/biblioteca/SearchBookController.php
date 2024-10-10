<?php

namespace Controller\biblioteca;

use MVC\Router;
use Model\Libros as ModeloLibros;

class SearchBookController
{
    public static function searchBook(Router $router): void
    {
        $search = $_GET['busqueda-libro'] ?? '';
        $search = filter_var($search, FILTER_SANITIZE_STRING);

        $libros = ModeloLibros::searchBook($search);

        $router->render('biblioteca/search',
            [
                'libros' => $libros,
                'search' => $search
            ]
        );
    }

}