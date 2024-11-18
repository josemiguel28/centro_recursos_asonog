<?php

namespace Controller\colaborador\api;

use MVC\models\DocumentosTecnicos;

class getPaginatedDocuments
{

    public static function getPaginatedDocuments()
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

    private static function hasMoreDocuments($documentos, $limit): bool
    {
        // Si el número de libros es menor que el límite, significa que no hay más libros
        return count($documentos) === $limit;
    }
}