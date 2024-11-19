<?php

namespace Controller\colaborador\api;

use MVC\models\DocumentosTecnicos;

class filterDocuments
{
    /**
     * Filtra documentos técnicos por temática.
     *
     * Este metodo filtra los documentos técnicos según la temática proporcionada, con paginación.
     * Si la solicitud es una petición AJAX, devuelve los datos en formato JSON.
     *
     * @return void
     */
    public static function filterDocumentsByTematica(): void
    {
        $tematica = sanitizar($_GET['tematica']) ?? '';
        $limit = 10; // Número de documentos por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $documentos = DocumentosTecnicos::filterDocumentsByTematica($tematica, $limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');
            echo json_encode(["documentos" => $documentos, "hasMoreDocuments" => false]);
            exit;
        }
    }

    /**
     * Filtra documentos técnicos por herramienta.
     *
     * Este metodo filtra los documentos técnicos según la herramienta proporcionada, con paginación.
     * Si la solicitud es una petición AJAX, devuelve los datos en formato JSON.
     *
     * @return void
     */
    public static function filterDocumentsByHerramienta(): void
    {
        $herramienta = sanitizar($_GET['herramienta']) ?? '';
        $limit = 10; // Número de documentos por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $documentos = DocumentosTecnicos::filterDocumentsByHerramienta($herramienta, $limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            header('Content-Type: application/json');
            echo json_encode(["documentos" => $documentos, "hasMoreDocuments" => false]);
            exit;
        }
    }
}