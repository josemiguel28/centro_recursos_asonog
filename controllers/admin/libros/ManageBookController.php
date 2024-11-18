<?php

namespace Controller\admin\libros;

use Clases\Request;
use Model\ActiveRecord;
use Model\Libros;
use MVC\models\LibrosCategorias;
use MVC\Router;

class ManageBookController extends ActiveRecord
{


    public static function showBooks(Router $router)
    {

        isAdmin();
        $books = Libros::getAllBooks();

        $router->render('admin/libros/gestion_libros',
            [
                'libros' => $books
            ]);
    }

    public static function gestionarLibro(Router $router): void
    {
        isAdmin();

        $request = new Request();
        $formAction = $request->get('mode');
        $getBookIdFromUrl = $request->get('id');
        $bookCategories = LibrosCategorias::getBooksCategories();
        $formTitle = setFormTitle($formAction);

        $book = self::getBookbyIdFromDb($getBookIdFromUrl);

        if (isPostBack()) {
            switch ($formAction) {
                case 'INS':
                    CreateBookController::crearLibro($_POST);
                    break;
                case 'UPD':
                    UpdateBookController::actualizarLibro($_POST, $book);
                    break;
                case 'DEL':
                    DeleteBookController::eliminarLibro($book);
                    break;
            }
        }

        $alertas = Libros::getAlertas();

        $router->render('admin/libros/formulario_libros',
            [
                'title' => $formTitle,
                'libro' => $book,
                'categorias' => $bookCategories,
                'mode' => $formAction,
                'alertas' => $alertas
            ]

        );
    }

    private static function getBookbyIdFromDb($id)
    {
        return Libros::where('id', $id);
    }


}