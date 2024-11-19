<?php

namespace Controller\colaborador\api;

use MVC\models\DocumentosTecnicos;

class getPaginatedDocuments
{
    /**
     * Obtiene una lista paginada de documentos técnicos.
     *
     * Este metodo obtiene una lista de documentos técnicos paginada según el límite y el offset proporcionados.
     * Si la solicitud es una petición AJAX, devuelve los datos en formato JSON.
     *
     * @return void
     */
    public static function getPaginatedDocuments(): void
    {
        $limit = 20; // Número de documentos por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $documentos = DocumentosTecnicos::getPaginatedDocuments($limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');

            $hasMoreDocuments = self::hasMoreDocuments($documentos, $limit);
            echo json_encode(["documentos" => $documentos, "hasMoreDocuments" => $hasMoreDocuments]);
            exit;
        }
    }

    /**
     * Verifica si hay más documentos disponibles.
     *
     * Este metodo verifica si hay más documentos disponibles comparando el número de documentos obtenidos con el límite.
     *
     * @param array $documentos Lista de documentos obtenidos.
     * @param int $limit Límite de documentos por página.
     * @return bool Retorna true si hay más documentos, false en caso contrario.
     */
    private static function hasMoreDocuments($documentos, $limit): bool
    {
        // Si el número de documentos es menor que el límite, significa que no hay más documentos
        return count($documentos) === $limit;
    }
}