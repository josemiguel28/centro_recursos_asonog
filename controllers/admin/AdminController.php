<?php

namespace Controller\admin;

use Clases\Request;
use Model\Libros;
use Model\Usuario;
use MVC\models\Bitacora;
use MVC\models\Documentos;
use MVC\Router;

date_default_timezone_set('UTC');

class AdminController
{

    public static function index(Router $router): void
    {

        $session = new Request();
        $session->startSession();

        isAdmin();

        //usuario que acaba de iniciar sesion
        $crrntUser = $_SESSION['nombre'] ?? "";
        $crrntUserId = $_SESSION["id"];

        //pasa la instancia de cada modelo a los metodos
        $Usuario = new Usuario();
        $Documentos = new Documentos();
        $Libros = new Libros();

        // Estadísticas de registros
        $totalDocumentsCount = self::getRecordsStats($Documentos);
        $totalBooksCount = self::getRecordsStats($Libros);
        $totalUsersCount = self::getRecordsStats($Usuario);

        // Estado de activos/inactivos por modelo
        $getUserState = self::countActiveAndInactiveRecords($Usuario);
        $getDocumentsState = self::countActiveAndInactiveRecords($Documentos);
        $getBooksState = self::countActiveAndInactiveRecords($Libros);

        $getAccessLog = Bitacora::getLogAccess();

        $router->render('admin/index', [
            'crrntUser' => $crrntUser,
            'crrntUserId' => $crrntUserId,
            'totalDocumentos' => $totalDocumentsCount,
            'totalLibros' => $totalBooksCount,
            'totalUsuarios' => $totalUsersCount,
            'userStatistics' => $getUserState,
            'documentStatistics' => $getDocumentsState,
            'bookStatistics' => $getBooksState,
            'accessLog' => $getAccessLog
        ]);

    }

    private static function getRecordsStats($modelo): int
    {
        $records = $modelo::all();
        return count($records);
    }

    private static function countActiveAndInactiveRecords($modelo): array
    {
        // Obtiene todos los registros del modelo
        $allRecords = $modelo::all();

        $USER_STATE_ACTIVE = "ACT";
        $USER_STATE_INACTIVE = "INA";

        $activeCount = 0;
        $inactiveCount = 0;

        // Itera sobre cada registro para contar activos e inactivos
        foreach ($allRecords as $record) {

            switch ($record->estado) {
                case $USER_STATE_ACTIVE:
                    $activeCount++;
                    break;

                case $USER_STATE_INACTIVE:
                    $inactiveCount++;
                    break;
            }
        }

        return [
            "activeCount" => $activeCount,
            "inactiveCount" => $inactiveCount
        ];
    }
}