<?php

namespace Controller\admin\libros;

use Clases\Request;
use Model\ActiveRecord;
use Model\Libros;
use MVC\models\LibrosCategorias;
use MVC\Router;

class ManageBookController extends ActiveRecord
{
    /**
     * Muestra la lista de libros.
     *
     * Este metodo verifica si el usuario es administrador, recupera todos los libros de la base de datos,
     * y renderiza la vista 'gestion_libros' con la lista de libros y el título de la página.
     *
     * @param Router $router La instancia del router utilizada para renderizar la vista.
     * @return void
     */
    public static function showBooks(Router $router): void
    {
        isAdmin();

        $perPage  = 10;
        $page     = max(1, (int) ($_GET['page'] ?? 1));
        $offset   = ($page - 1) * $perPage;
        $total    = Libros::countAllBooks();
        $lastPage = (int) ceil($total / $perPage);
        $books    = Libros::getAdminPaginatedBooks($perPage, $offset);
        $alertas  = array_merge_recursive(Libros::getAlertas(), getFlashAlertas());

        $router->render('admin/libros/gestion_libros',
            [
                'libros'    => $books,
                'alertas'   => $alertas,
                'titlePage' => 'Gestión de biblioteca',
                'page'      => $page,
                'lastPage'  => $lastPage,
                'total'     => $total,
                'perPage'   => $perPage,
            ]);
    }

    /**
     * Gestiona las acciones relacionadas con un libro.
     *
     * Este metodo verifica si el usuario es administrador, obtiene la acción del formulario y el ID del libro de la URL,
     * recupera las categorías de libros y el título del formulario, y luego realiza la acción correspondiente (crear, actualizar o eliminar).
     * Finalmente, renderiza el formulario de libros con las alertas generadas.
     *
     * @param Router $router La instancia del router utilizada para renderizar la vista.
     * @return void
     */
    public static function gestionarLibro(Router $router): void
    {
        isAdmin();

        $request = new Request();
        $formAction = $request->get('mode');
        $getBookIdFromUrl = $request->get('id');
        $bookCategories = LibrosCategorias::getBooksCategories();
        $formTitle = setFormTitle($formAction);

        $book = self::getBookbyIdFromDb($getBookIdFromUrl);
        $bookData = $book;

        if (isPostBack()) {
            switch ($formAction) {
                case 'INS':
                    $bookData = CreateBookController::crearLibro($_POST);
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
                'libro' => $bookData,
                'categorias' => $bookCategories,
                'mode' => $formAction,
                'alertas' => $alertas,
                'titlePage' => $formTitle,
                //'bookData' => $bookData
            ]
        );
    }

    private static function getBookbyIdFromDb($id)
    {
        return Libros::where('id', $id);
    }
}