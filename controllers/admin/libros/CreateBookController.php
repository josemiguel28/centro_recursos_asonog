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
    public static function crearLibro($args): array
    {
        $libro = new Libros();

        $libro->sincronizar($args);

        // Procesar archivos
        $imagenValida = FileHandler::procesarImagen($libro, CARPETA_IMAGENES_LIBROS);
        $pdfValido = FileHandler::procesarPDF($libro, CARPETA_LIBROS);

        if ($imagenValida && $pdfValido) {
            $libro->crear();
            Libros::setAlerta('success', 'Libro creado correctamente.');
        } else {
            Libros::getAlertas();
        }

        return Libros::getAlertas();
    }
}



