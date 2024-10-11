<?php

require_once __DIR__ . '/../includes/app.php';

use Controller\auth\ConfirmarCuenta;
use Controller\auth\CreateAccount;
use Controller\auth\LoginController;
use Controller\auth\PasswordResetController;
use Controller\auth\PasswordResetRequestController;
use Controller\biblioteca\api\BibliotecaAPI;
use Controller\biblioteca\BibliotecaController;
use Controller\biblioteca\SearchBookController;
use Controller\home\HomeController;
use MVC\Router;

$router = new Router();

//pagina de inicio
$router->get("/", [HomeController::class, 'index']);
$router->post("/", [HomeController::class, 'index']);

//pagina de biblioteca
$router->get("/biblioteca", [BibliotecaController::class, 'index']);
$router->get("/search", [SearchBookController::class, 'searchBook']);

//api de biblioteca
$router->get("/api/get-paginated-books", [BibliotecaAPI::class, 'getPaginatedBooks']);
$router->get("/api/filter-books-by-category", [BibliotecaAPI::class, 'filterBooksByCategory']);

//iniciar sesion
$router->get("/login", [LoginController::class, 'login']);
$router->post("/login", [LoginController::class, 'login']);
//$router->get("/logout", [LoginController::class, 'logout']);

//area privada
$router->get("/admin", [\Controller\admin\AdminController::class, 'index']);


//recuperar password
$router->get("/olvide", [PasswordResetRequestController::class, 'requestReset']);
$router->post("/olvide", [PasswordResetRequestController::class, 'requestReset']);
$router->get("/recuperar", [PasswordResetController::class, 'changePassword']);
$router->post("/recuperar", [PasswordResetController::class, 'changePassword']);

//crear cuenta
$router->get("/crear-cuenta", [CreateAccount::class, 'crearCuenta']);
$router->post("/crear-cuenta", [CreateAccount::class, 'crearCuenta']);
$router->post("/logout", [LoginController::class, 'logout']);

//confirmar cuenta
$router->get("/confirmar-cuenta", [ConfirmarCuenta::class, 'confirmarCuenta']);
$router->get("/mensaje", [ConfirmarCuenta::class, 'mensaje']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();