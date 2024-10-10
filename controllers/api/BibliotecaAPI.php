<?php

namespace Controller\api;

use MVC\Router;
use Model\Libros as ModeloLibros;

class BibliotecaAPI
{
    public static function getPaginatedBooks()
    {
        $limit = 10; // Número de libros por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        // Obtener libros con límite y offset
        $libros = ModeloLibros::getPaginatedBooks($limit, $offset);

        // Verificar si es una solicitud AJAX para "Mostrar más"
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            // Devolver los libros como JSON
            header('Content-Type: application/json');

            $hasMoreBooks = self::hasMoreBooks($libros, $limit);
            echo json_encode(["libros" => $libros, "hasMoreBooks" => $hasMoreBooks]);
            exit;
        }
    }

    private static function hasMoreBooks($libros, $limit): bool
    {
        // Si el número de libros es menor que el límite, significa que no hay más libros
        return count($libros) === $limit;
    }
}
