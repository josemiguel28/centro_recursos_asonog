<?php

namespace Controller\libros;

use Model\ActiveRecord;
use Model\Libros;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class CreateBookController extends ActiveRecord
{
    public static function crearLibro(Router $router)
    {
        $libro = new Libros();

        if (isPostBack()) {
            $libro->sincronizar($_POST);

            $guardarImagen = self::procesarImagen($libro);
            $guardarPDF = self::procesarPDF($libro);

            if (!$guardarImagen || !$guardarPDF) {
                Libros::getAlertas();
            }else{
                $libro->crear();
                Libros::setAlerta('text-green-500 bg-green-100', 'Libro creado correctamente.');
                $libro = new Libros();
            }
        }

        $alertas = Libros::getAlertas();
        $router->render('admin/crearLibro', [
            'libro' => $libro,
            'alertas' => $alertas
        ]);
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

    private static function procesarImagen($libro)
    {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $tipoImagen = mime_content_type($_FILES['imagen']['tmp_name']);
            $imageSize = $_FILES['imagen']['size'];

            if (!in_array($tipoImagen, ['image/jpeg', 'image/png'])) {
                Libros::setAlerta('text-red-500 bg-red-100', 'La imagen debe ser un archivo JPG o PNG.');
                return false;
            }

            if ($imageSize > 2 * 1024 * 1024) {
                Libros::setAlerta('text-red-500 bg-red-100', 'El tamaño de la imagen debe ser menor a 2 MB.');
                return false;
            }

            $nombreImagen = self::generarNombreArchivo('jpg');

            self::crearCarpetaSiNoExiste(CARPETA_IMAGENES);
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
            $libro->setFileName($nombreImagen, "imagen");

            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }

        return true;
    }

    private static function procesarPDF($libro)
    {
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $tipoPDF = mime_content_type($_FILES['archivo']['tmp_name']);
            $pdfSize = $_FILES['archivo']['size'];

            if ($tipoPDF !== 'application/pdf') {
                Libros::setAlerta('text-red-500 bg-red-100', 'El archivo debe ser un PDF.');
                return false;
            }

            if ($pdfSize > 10 * 1024 * 1024) {
                Libros::setAlerta('text-red-500 bg-red-100', 'El tamaño del archivo debe ser menor a 10 MB.');
                return false;
            }

            $nombrepdf = self::generarNombreArchivo('pdf');

            self::crearCarpetaSiNoExiste(CARPETA_LIBROS);
            if (!move_uploaded_file($_FILES['archivo']['tmp_name'], CARPETA_LIBROS . $nombrepdf)) {
                Libros::setAlerta('text-red-500 bg-red-100', 'Ocurrió un error al subir el archivo.');
                return false;
            }

            $libro->setFileName($nombrepdf, "archivo");
        }

        return true;
    }
}



