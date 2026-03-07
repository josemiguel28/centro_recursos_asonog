<?php

namespace Controller\admin\libros\api;

use Clases\FileHandler;
use Exception;

class UploadPdfController
{
    /**
     * Maneja la subida de archivos PDF vía AJAX.
     *
     * Este método procesa la subida de un archivo PDF de forma asíncrona,
     * valida el archivo y lo guarda en el servidor, devolviendo una respuesta JSON.
     *
     * @return void
     */
    public static function uploadPdf(): void
    {
        header('Content-Type: application/json');
        
        // Verificar que sea una petición POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode([
                'success' => false,
                'message' => 'Método no permitido'
            ]);
            return;
        }

        try {
            // Verificar que se haya enviado un archivo
            if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
                throw new Exception('Error al subir el archivo PDF.');
            }

            // Validar tipo de archivo
            $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
            if ($tipoPDF !== 'application/pdf') {
                throw new Exception('El archivo debe ser un PDF.');
            }

            // Validar tamaño del archivo (100MB)
            $pdfSize = $_FILES['archivo']['size'];
            $maxSize = 100 * 1024 * 1024; // 100MB
            if ($pdfSize > $maxSize) {
                throw new Exception('El tamaño del archivo debe ser menor a 100 MB.');
            }

            // Generar nombre único para el archivo
            $nombrePdf = md5(uniqid(rand(), true)) . '.pdf';
            
            // Crear carpeta si no existe
            if (!is_dir(CARPETA_LIBROS)) {
                mkdir(CARPETA_LIBROS, 0755, true);
            }

            // Mover el archivo a la ubicación deseada
            $rutaCompleta = CARPETA_LIBROS . $nombrePdf;
            if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
                throw new Exception('Error al guardar el archivo en el servidor.');
            }

            // Obtener el nombre original del archivo
            $nombreOriginal = $_FILES['archivo']['name'];

            // Respuesta exitosa
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Archivo subido correctamente',
                'data' => [
                    'filename' => $nombrePdf,
                    'originalName' => $nombreOriginal,
                    'size' => $pdfSize,
                    'url' => '/libros/' . $nombrePdf
                ]
            ]);

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Elimina un archivo PDF previamente subido.
     *
     * Este método elimina un archivo PDF del servidor cuando el usuario
     * cancela la subida o selecciona otro archivo.
     *
     * @return void
     */
    public static function deletePdf(): void
    {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode([
                'success' => false,
                'message' => 'Método no permitido'
            ]);
            return;
        }

        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $filename = $data['filename'] ?? '';

            if (empty($filename)) {
                throw new Exception('Nombre de archivo no proporcionado.');
            }

            // Validar que el archivo existe y está en la carpeta correcta
            $rutaCompleta = CARPETA_LIBROS . $filename;
            
            if (!file_exists($rutaCompleta)) {
                throw new Exception('El archivo no existe.');
            }

            // Eliminar el archivo
            if (!unlink($rutaCompleta)) {
                throw new Exception('Error al eliminar el archivo.');
            }

            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Archivo eliminado correctamente'
            ]);

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
