<?php

require_once __DIR__ . '/../includes/app.php';

use Controller\admin\AdminController;
use Controller\admin\documentos\CreateDocumentController;
use Controller\admin\libros\CreateBookController;
use Controller\admin\usuarios\ManageUserController;
use Controller\auth\ConfirmarCuenta;
use Controller\auth\LoginController;
use Controller\auth\PasswordResetController;
use Controller\auth\PasswordResetRequestController;
use Controller\biblioteca\api\BibliotecaAPI;
use Controller\biblioteca\BibliotecaController;
use Controller\biblioteca\SearchBookController;
use Controller\colaborador\api\filterDocuments;
use Controller\colaborador\api\getPaginatedDocuments;
use Controller\colaborador\ColaboradorController;
use Controller\colaborador\SearchDocumentController;
use Controller\home\HomeController;
use Controller\admin\libros\ManageBookController;
use Controller\admin\documentos\ManageDocumentsController;
use MVC\Router;

$router = new Router();

//pagina de inicio
$router->get("/", [HomeController::class, 'index']);
$router->post("/", [HomeController::class, 'index']);

$router->get("/nosotros", [HomeController::class, 'nosotros']);

//pagina de biblioteca
$router->get("/biblioteca", [BibliotecaController::class, 'index']);
$router->get("/search-book", [SearchBookController::class, 'searchBook']);

//api de biblioteca
$router->get("/api/get-paginated-books", [BibliotecaAPI::class, 'getPaginatedBooks']);
$router->get("/api/filter-books-by-category", [BibliotecaAPI::class, 'filterBooksByCategory']);

//api de colaborador (repositorio)
$router->get("/api/get-paginated-documents", [getPaginatedDocuments::class, 'getPaginatedDocuments']);
$router->get("/api/filter-documents-by-tematica", [filterDocuments::class, 'filterDocumentsByTematica']);
$router->get("/api/filter-documents-by-herramienta", [filterDocuments::class, 'filterDocumentsByHerramienta']);

//iniciar sesion
$router->get("/login", [LoginController::class, 'login']);
$router->post("/login", [LoginController::class, 'login']);
$router->get("/logout", [LoginController::class, 'logout']);

//area privada
$router->get("/admin", [AdminController::class, 'index']);
$router->get("/colaborador", [ColaboradorController::class, 'index']);
$router->get("/search-document", [SearchDocumentController::class, 'searchDocument']);

//recuperar password
$router->get("/olvide", [PasswordResetRequestController::class, 'requestReset']);
$router->post("/olvide", [PasswordResetRequestController::class, 'requestReset']);
$router->get("/recuperar", [PasswordResetController::class, 'changePassword']);
$router->post("/recuperar", [PasswordResetController::class, 'changePassword']);

//crear cuenta
$router->get("/usuario", [ManageUserController::class, 'gestionarUsuario']);
$router->post("/usuario", [ManageUserController::class, 'gestionarUsuario']);
$router->post("/logout", [LoginController::class, 'logout']);

//crear libro
//$router->get("/libro", [CreateBookController::class, 'crearLibro']);
//$router->post("/libro", [CreateBookController::class, 'crearLibro']);
$router->post("/logout", [LoginController::class, 'logout']);

//crear documento
$router->get("/crear-documento", [CreateDocumentController::class, 'createDocument']);
$router->post("/crear-documento", [CreateDocumentController::class, 'createDocument']);

//confirmar cuenta
$router->get("/confirmar-cuenta", [ConfirmarCuenta::class, 'confirmarCuenta']);
$router->post("/confirmar-cuenta", [ConfirmarCuenta::class, 'confirmarCuenta']);
$router->get("/mensaje", [ConfirmarCuenta::class, 'mensaje']);

//CRUD de usuarios
$router->get("/usuarios/gestionar", [ManageUserController::class, 'index']);

//CRUD de libros
$router->get("/gestionar/libros", [ManageBookController::class, 'showBooks']);
$router->post("/libro", [ManageBookController::class, 'gestionarLibro']);
$router->get("/libro", [ManageBookController::class, 'gestionarLibro']);

//CRUD de documentos
$router->get("/repositorio/gestionar", [ManageDocumentsController::class, 'showDocuments']);
$router->post("/documento", [ManageDocumentsController::class, 'gestionarDocumento']);
$router->get("/documento", [ManageDocumentsController::class, 'gestionarDocumento']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();