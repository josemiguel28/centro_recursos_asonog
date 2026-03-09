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
        self::doUpload(CARPETA_LIBROS, '/libros/');
    }

    public static function uploadDocumentoPdf(): void
    {
        self::doUpload(CARPETA_DOCUMENTOS, '/documentos/');
    }

    private static function doUpload(string $carpeta, string $urlBase): void
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            return;
        }

        try {
            // Verificar que se haya enviado un archivo
            if (!isset($_FILES['archivo'])) {
                // Puede ocurrir cuando post_max_size es superado: PHP vacía $_FILES y $_POST
                $contentLength = (int)($_SERVER['CONTENT_LENGTH'] ?? 0);
                $postMaxSize   = self::parseSize(ini_get('post_max_size'));
                if ($postMaxSize > 0 && $contentLength > $postMaxSize) {
                    throw new Exception(
                        'El archivo supera el límite del servidor (' . self::formatBytes($postMaxSize) . '). ' .
                        'Contacta al administrador para aumentar post_max_size.'
                    );
                }
                throw new Exception('No se recibió ningún archivo en la petición.');
            }

            $uploadError = $_FILES['archivo']['error'];
            if ($uploadError !== UPLOAD_ERR_OK) {
                $uploadErrorMessages = [
                    UPLOAD_ERR_INI_SIZE   => 'El archivo supera el límite de upload_max_filesize (' . ini_get('upload_max_filesize') . ').',
                    UPLOAD_ERR_FORM_SIZE  => 'El archivo supera el límite MAX_FILE_SIZE del formulario.',
                    UPLOAD_ERR_PARTIAL    => 'El archivo se subió de forma parcial.',
                    UPLOAD_ERR_NO_FILE    => 'No se seleccionó ningún archivo.',
                    UPLOAD_ERR_NO_TMP_DIR => 'Falta el directorio temporal en el servidor.',
                    UPLOAD_ERR_CANT_WRITE => 'No se pudo escribir el archivo en el disco del servidor.',
                    UPLOAD_ERR_EXTENSION  => 'Una extensión de PHP detuvo la subida.',
                ];
                $errorMsg = $uploadErrorMessages[$uploadError]
                    ?? "Error de subida desconocido (código: {$uploadError}).";
                throw new Exception($errorMsg);
            }

            // Validar tipo de archivo (con fallback si fileinfo no está disponible)
            if (function_exists('mime_content_type')) {
                $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
                if ($tipoPDF !== 'application/pdf') {
                    throw new Exception('El archivo debe ser un PDF (tipo detectado: ' . $tipoPDF . ').');
                }
            } else {
                // Fallback: validar por extensión
                $extension = strtolower(pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION));
                if ($extension !== 'pdf') {
                    throw new Exception('El archivo debe tener extensión .pdf');
                }
            }

            // Validar tamaño del archivo (100MB)
            $pdfSize = $_FILES['archivo']['size'];
            $maxSize = 100 * 1024 * 1024; // 100MB
            if ($pdfSize > $maxSize) {
                throw new Exception('El tamaño del archivo debe ser menor a 100 MB.');
            }

            // Generar nombre único para el archivo
            $nombrePdf = md5(uniqid(rand(), true)) . '.pdf';
            
            if (!is_dir($carpeta)) {
                mkdir($carpeta, 0755, true);
            }

            $rutaCompleta = $carpeta . $nombrePdf;
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
                    'url' => $urlBase . $nombrePdf
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

    /** Convierte un string de tamaño PHP (p.ej. "8M") a bytes. */
    private static function parseSize(string $size): int
    {
        $size = trim($size);
        $unit = strtoupper(substr($size, -1));
        $value = (int)$size;
        switch ($unit) {
            case 'G': return $value * 1024 * 1024 * 1024;
            case 'M': return $value * 1024 * 1024;
            case 'K': return $value * 1024;
            default:  return $value;
        }
    }

    /** Formatea bytes en una cadena legible. */
    private static function formatBytes(int $bytes): string
    {
        if ($bytes >= 1024 * 1024 * 1024) return round($bytes / (1024 ** 3), 1) . ' GB';
        if ($bytes >= 1024 * 1024)        return round($bytes / (1024 ** 2), 1) . ' MB';
        if ($bytes >= 1024)               return round($bytes / 1024, 1) . ' KB';
        return $bytes . ' B';
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
        self::doDeletePdf(CARPETA_LIBROS);
    }

    public static function deleteDocumentoPdf(): void
    {
        self::doDeletePdf(CARPETA_DOCUMENTOS);
    }

    private static function doDeletePdf(string $carpeta): void
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            return;
        }

        try {
            $data     = json_decode(file_get_contents('php://input'), true);
            $filename = $data['filename'] ?? '';

            if (empty($filename)) {
                throw new Exception('Nombre de archivo no proporcionado.');
            }

            $rutaCompleta = $carpeta . $filename;

            if (!file_exists($rutaCompleta)) {
                throw new Exception('El archivo no existe.');
            }

            if (!unlink($rutaCompleta)) {
                throw new Exception('Error al eliminar el archivo.');
            }

            http_response_code(200);
            echo json_encode(['success' => true, 'message' => 'Archivo eliminado correctamente']);

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
