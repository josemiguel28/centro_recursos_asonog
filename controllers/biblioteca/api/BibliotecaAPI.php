<?php

namespace Controller\biblioteca\api;

use Model\Libros as ModeloLibros;

class BibliotecaAPI
{
    /**
     * Obtiene una lista paginada de libros.
     *
     * Este metodo obtiene una lista de libros paginada según el límite y el offset proporcionados.
     * Si la solicitud es una petición AJAX, devuelve los datos en formato JSON.
     *
     * @return void
     */
    public static function getPaginatedBooks(): void
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

    /**
     * Filtra libros por categoría.
     *
     * Este metodo filtra los libros según la categoría proporcionada, con paginación.
     * Si la solicitud es una petición AJAX, devuelve los datos en formato JSON.
     *
     * @return void
     */
    public static function filterBooksByCategory(): void
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

    /**
     * Verifica si hay más libros disponibles.
     *
     * Este metodo verifica si hay más libros disponibles comparando el número de libros obtenidos con el límite.
     *
     * @param array $libros Lista de libros obtenidos.
     * @param int $limit Límite de libros por página.
     * @return bool Retorna true si hay más libros, false en caso contrario.
     */
    private static function hasMoreBooks($libros, $limit): bool
    {
        // Si el número de libros es menor que el límite, significa que no hay más libros
        return count($libros) === $limit;
    }
}