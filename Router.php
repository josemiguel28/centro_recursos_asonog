<?php

namespace MVC;

use Model\Usuario;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    private array $protectedRoutes =
        [
            '/admin',
            '/usuario',
            '/usuarios/gestionar',
            '/libro',
            '/gestionar/libros',
            '/documento',
            '/repositorio/gestionar'
        ];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    private function protectedRoutes($currentUrl)
    {
        session_start();
        $auth = $_SESSION["login"] ?? null;

        // Excluir rutas que no necesitan validación de login
        if (in_array($currentUrl, $this->protectedRoutes) && !$auth) {
            redirectToWithMsg("/login", "Debes iniciar sesión para ver este recurso.");
        }
    }

    public function comprobarRutas()
    {
        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        self::protectedRoutes($currentUrl);

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            // Llamar la función correspondiente
            call_user_func($fn, $this);
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }


    public function render($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}
