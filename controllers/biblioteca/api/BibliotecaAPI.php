<?php

namespace Controller\biblioteca\api;

use Model\Libros as ModeloLibros;

class BibliotecaAPI
{
    public static function getPaginatedBooks()
    {
        $limit = 10; // Número de libros por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $libros = ModeloLibros::getPaginatedBooks($limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');

            $hasMoreBooks = self::hasMoreBooks($libros, $limit);
            echo json_encode(["libros" => $libros, "hasMoreBooks" => $hasMoreBooks]);
            exit;
        }
    }

    public static function filterBooksByCategory()
    {
        $categoria = sanitizar($_GET['categoria']) ?? '';
        $limit = 10; // Número de libros por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $libros = ModeloLibros::filterBooksByCategory($categoria, $limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            header('Content-Type: application/json');
            echo json_encode(["libros" => $libros, "hasMoreBooks" => false]);
            exit;
        }
    }

    private static function hasMoreBooks($libros, $limit): bool
    {
        // Si el número de libros es menor que el límite, significa que no hay más libros
        return count($libros) === $limit;
    }
}
