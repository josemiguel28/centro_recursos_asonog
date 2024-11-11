<?php

namespace MVC\models;

use Model\ActiveRecord;

class LibrosCategorias extends ActiveRecord
{

    protected static $tabla = 'libros_categorias';
    protected static $columnasDB = ['id_categoria', 'nombre'];

    public $id_categoria;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id_categoria = $args['id_categoria'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public static function getBooksCategories(): array
    {
        $sql = "SELECT * FROM " . self::$tabla . ";";
        return self::consultarSQL($sql);
    }

    public static function getBookCategoriesWithLimit()
    {
        $sql = "SELECT * FROM " . self::$tabla . " LIMIT 4;";
        return self::consultarSQL($sql);
    }


}