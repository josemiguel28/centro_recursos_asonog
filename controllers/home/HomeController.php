<?php

namespace Controller\home;

use MVC\models\LibrosCategorias;
use MVC\Router;
use Model\Libros as ModeloLibros;
class HomeController
{
    public static function index(Router $router): void
    {
        $categorias = LibrosCategorias::getBookCategoriesWithLimit();
        $libros = ModeloLibros::getActiveBooksWithLimit();

        $router->render('home/index',
            [
                'categorias' => $categorias,
                'libros' => $libros,
                'titlePage' => "Inicio"
            ]
        );
    }

    public static function nosotros(Router $router): void
    {
        $router->render('home/nosotros');
    }
}