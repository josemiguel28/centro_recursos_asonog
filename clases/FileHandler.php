<?php

namespace Clases;

class FileHandler
{
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

}