<?php

namespace Controller\admin\libros;

use Model\ActiveRecord;
use Model\Libros;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class CreateBookController extends ActiveRecord
{
    const MAX_IMAGE_SIZE = 2 * 1024 * 1024; // 2MB
    const MAX_PDF_SIZE = 10 * 1024 * 1024; // 10MB
    const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png'];
    const ALLOWED_PDF_TYPE = 'application/pdf';

    public static function crearLibro($args)
    {
        $libro = new Libros();

        $libro->sincronizar($args);

        // Procesar archivos
        $imagenValida = self::procesarImagen($libro);
        $pdfValido = self::procesarPDF($libro);

        if ($imagenValida && $pdfValido) {
            $libro->crear();
            Libros::setAlerta('success', 'Libro creado correctamente.');
            $libro = new Libros(); // Reiniciar el objeto
        } else {
            Libros::getAlertas();
        }

        return Libros::getAlertas();

        /*
        $router->render('admin/crearLibro', ['libro' => $libro,
            'alertas' => $alertas]);
    */
    }

    private static function crearCarpetaSiNoExiste($carpeta)
    {
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
    }

    private static function generarNombreArchivo($extension)
    {
        return md5(uniqid(strval(rand()), true)) . '.' . $extension;
    }

    public static function procesarImagen($libro)
    {
        if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            Libros::setAlerta('fail', 'Error al subir la imagen.');
            return false;
        }

        $tipoImagen = mime_content_type($_FILES['imagen']['tmp_name']);
        $imageSize = $_FILES['imagen']['size'];

        if (!in_array($tipoImagen, self::ALLOWED_IMAGE_TYPES)) {
            Libros::setAlerta('fail', 'La imagen debe ser un archivo JPG o PNG.');
            return false;
        }

        if ($imageSize > self::MAX_IMAGE_SIZE) {
            Libros::setAlerta('fail', 'El tamaño de la imagen debe ser menor a 2 MB.');
            return false;
        }

        $nombreImagen = self::generarNombreArchivo('jpg');
        self::crearCarpetaSiNoExiste(CARPETA_IMAGENES);

        // Procesar la imagen
        try {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 1200);
            $libro->setFileName($nombreImagen, "imagen");
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        } catch (Exception $e) {
            Libros::setAlerta('fail', 'Error al procesar la imagen.');
            return false;
        }

        return true;
    }

    public static function procesarPDF($libro)
    {
        if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
            Libros::setAlerta('fail', 'Error al subir el archivo PDF.');
            return false;
        }

        $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
        $pdfSize = $_FILES['archivo']['size'];

        if ($tipoPDF !== self::ALLOWED_PDF_TYPE) {
            Libros::setAlerta('fail', 'El archivo debe ser un PDF.');
            return false;
        }

        if ($pdfSize > self::MAX_PDF_SIZE) {
            Libros::setAlerta('fail', 'El tamaño del archivo debe ser menor a 10 MB.');
            return false;
        }

        $nombrepdf = self::generarNombreArchivo('pdf');
        self::crearCarpetaSiNoExiste(CARPETA_LIBROS);

        // Mover el archivo PDF al servidor
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], CARPETA_LIBROS . $nombrepdf)) {
            Libros::setAlerta('fail', 'Ocurrió un error al subir el archivo PDF.');
            return false;
        }

        $libro->setFileName($nombrepdf, "archivo");
        return true;
    }
}



