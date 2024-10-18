<?php

namespace Controller\colaborador\api;

use MVC\models\DocumentosTecnicos;

class filterDocuments
{

    public static function filterDocumentsByTematica()
    {
        $tematica = sanitizar($_GET['tematica']) ?? '';
        $limit = 10; // Número de libros por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $documentos = DocumentosTecnicos::filterDocumentsByTematica($tematica, $limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            header('Content-Type: application/json');
            echo json_encode(["documentos" => $documentos, "hasMoreDocuments" => false]);
            exit;
        }
    }

    public static function filterDocumentsByHerramienta()
    {
        $herramienta = sanitizar($_GET['herramienta']) ?? '';
        $limit = 10; // Número de libros por página
        $offset = $_GET['offset'] ?? 0; // Usamos 0 si no hay offset enviado desde js

        $documentos = DocumentosTecnicos::filterDocumentsByHerramienta($herramienta, $limit, $offset);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            header('Content-Type: application/json');
            echo json_encode(["documentos" => $documentos, "hasMoreDocuments" => false]);
            exit;
        }
    }

}