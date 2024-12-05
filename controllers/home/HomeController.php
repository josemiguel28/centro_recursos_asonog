<?php

namespace Controller\home;

use Clases\Email;
use Clases\EmailForm;
use Model\ActiveRecord;
use MVC\models\LibrosCategorias;
use MVC\Router;
use Model\Libros as ModeloLibros;
class HomeController
{
    public static function index(Router $router): void
    {
        $categorias = LibrosCategorias::getBookCategoriesWithLimit();
        $libros = ModeloLibros::getActiveBooksWithLimit();

        if (isPostBack()){
            self::processForm();
            redirectToWithMsg('/', 'El mensaje se envio correctamente.');
            //ActiveRecord::setAlerta('success', "El mensaje se envio correctamente.");
        }

        $router->render('home/index',
            [
                'categorias' => $categorias,
                'libros' => $libros,
                'titlePage' => "Inicio",
                'alertas' => ActiveRecord::getAlertas()
            ]
        );
    }

    public static function nosotros(Router $router): void
    {
        $router->render('home/nosotros');
    }

    private static function processForm(): void
    {
        $datos = [
            'correo' => $_POST['correo'],
            'tema' => $_POST['tema'],
            'mensaje' => $_POST['mensaje']
        ];

        // Crear una instancia de Email
        $email = new EmailForm();
        $email->enviarFormularioContacto($datos);
    }
}