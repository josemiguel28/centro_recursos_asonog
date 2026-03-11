<?php

namespace Controller\admin\libros;

use Clases\FileHandler;
use Intervention\Image\File;
use Model\ActiveRecord;
use Model\Libros;
use Intervention\Image\ImageManagerStatic as Image;

class CreateBookController extends ActiveRecord
{
    /**
     * Crea un nuevo libro con los argumentos proporcionados.
     *
     * Este metodo sincroniza el libro con los argumentos proporcionados, procesa los archivos de imagen y PDF,
     * y guarda el libro. También establece alertas apropiadas según el resultado.
     *
     * @param array $args Los argumentos para sincronizar con el libro.
     * @return array Las alertas generadas durante el proceso.
     */
    public static function crearLibro($args)
    {
        $libro = new Libros();

        $libro->sincronizar($args);

        // Procesar imagen
        $imagenValida = FileHandler::procesarImagen($libro, CARPETA_IMAGENES_LIBROS);
        
        // Verificar si el PDF ya fue subido vía AJAX
        $pdfValido = false;
        if (!empty($args['pdf_filename'])) {
            // El archivo PDF ya fue subido, solo asignamos el nombre
            $libro->archivo_url = $args['pdf_filename'];
            $pdfValido = true;
        } else {
            // Fallback: intentar subir el PDF de forma tradicional si no se usó AJAX
            $pdfValido = FileHandler::procesarPDF($libro, CARPETA_LIBROS);
        }

        if ($imagenValida && $pdfValido) {
            $libro->crear();
            setFlashAlerta('success','Libro creado exitosamente');
            header('Location: /gestionar/libros');
            exit;
        } else {
            // Si el PDF fue subido pero falla la imagen, eliminar el PDF subido
            if ($pdfValido && !empty($libro->archivo_url)) {
                FileHandler::deleteFile(CARPETA_LIBROS . $libro->archivo_url);
            }
            Libros::getAlertas();
        }

        return $libro;
    }
}



