<?php

namespace Clases;

use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class FileHandler
{
    const MAX_IMAGE_SIZE = 2 * 1024 * 1024; // 2MB
    const MAX_PDF_SIZE = 10 * 1024 * 1024; // 10MB
    const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png'];
    const ALLOWED_PDF_TYPE = 'application/pdf';


    /**
     * Procesa un archivo de imagen subido.
     *
     * Este metodo maneja la carga, validación y procesamiento de un archivo de imagen.
     * Verifica si hay errores en la carga, valida el tipo y tamaño del archivo, genera un nombre
     * de archivo único, crea el directorio necesario si no existe y redimensiona la imagen.
     *
     * @param object $model La instancia del modelo para establecer alertas y nombre de archivo.
     * @param string $imagePath La ruta donde se guardará la imagen procesada.
     * @return bool Devuelve true si la imagen se procesó correctamente, false en caso contrario.
     */
    public static function procesarImagen($model, $imagePath): bool
    {

        if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            $model::setAlerta('fail', 'Error al subir la imagen.');
            return false;
        }

        $tipoImagen = mime_content_type($_FILES['imagen']['tmp_name']);
        $imageSize = $_FILES['imagen']['size'];

        if (!in_array($tipoImagen, self::ALLOWED_IMAGE_TYPES)) {
            $model::setAlerta('fail', 'La imagen debe ser un archivo JPG o PNG.');
            return false;
        }

        if ($imageSize > self::MAX_IMAGE_SIZE) {
            $model::setAlerta('fail', 'El tamaño de la imagen debe ser menor a 2 MB.');
            return false;
        }

        $nombreImagen = self::generarNombreArchivo('jpg');
        self::crearCarpetaSiNoExiste(CARPETA_IMAGENES_DOCUMENTOS);

        // Procesa la imagen
        try {
            ini_set('memory_limit', '256M'); // Aumenta temporalmente el límite de memoria
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 1200);
            $model->setFileName($nombreImagen, "imagen");
            $image->save($imagePath . $nombreImagen);
        } catch (Exception $e) {
            $model::setAlerta('fail', 'Error al procesar la imagen.');
            return false;
        }

        return true;
    }

    /**
     * Procesa un archivo PDF subido.
     *
     * Este metodo maneja la carga, validación y procesamiento de un archivo PDF.
     * Verifica si hay errores en la carga, valida el tipo y tamaño del archivo, genera un nombre
     * de archivo único, crea el directorio necesario si no existe y mueve el archivo a la ubicación deseada.
     *
     * @param object $model La instancia del modelo para establecer alertas y nombre de archivo.
     * @param string $pdfPath La ruta donde se guardará el archivo PDF procesado.
     * @return bool Devuelve true si el archivo PDF se procesó correctamente, false en caso contrario.
     */
    public static function procesarPDF($model, $pdfPath): bool
    {
        if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
            $model::setAlerta('fail', 'Error al subir el archivo PDF.');
            return false;
        }

        $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
        $pdfSize = $_FILES['archivo']['size'];

        if ($tipoPDF !== self::ALLOWED_PDF_TYPE) {
            $model::setAlerta('fail', 'El archivo debe ser un PDF.');
            return false;
        }

        if ($pdfSize > self::MAX_PDF_SIZE) {
            $model::setAlerta('fail', 'El tamaño del archivo debe ser menor a 10 MB.');
            return false;
        }

        $nombrepdf = self::generarNombreArchivo('pdf');
        self::crearCarpetaSiNoExiste(CARPETA_DOCUMENTOS);

        // Mueve el archivo PDF a la ubicación deseada
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $pdfPath . $nombrepdf)) {
            $model::setAlerta('fail', 'Ocurrió un error al subir el archivo PDF.');
            return false;
        }

        // Establece el nombre del archivo en el modelo
        $model->setFileName($nombrepdf, "archivo");
        return true;
    }

    public static function crearCarpetaSiNoExiste($carpeta): void
    {
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
    }

    public static function generarNombreArchivo($extension): string
    {
        return md5(uniqid(strval(rand()), true)) . '.' . $extension;
    }


    /**
     * Elimina un archivo del servidor.
     *
     * Este metodo elimina el archivo especificado si existe y lanza una excepción si la eliminación falla.
     *
     * @param string $filePath La ruta al archivo a eliminar.
     * @return void
     * @throws Exception Si el archivo no pudo ser eliminado.
     */
    public static function deleteFile($filePath): void
    {
        if ($filePath && file_exists($filePath) && !unlink($filePath)) {
            throw new Exception("Error al eliminar el archivo anterior.");
        }
    }
}