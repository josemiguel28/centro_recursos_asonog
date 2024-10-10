<?php

namespace Model;

use Model\ActiveRecord;

class Libros extends ActiveRecord
{
    protected static $tabla = 'libros';
    protected static $columnasDB = ['id', 'titulo', 'autor', 'categoria', 'anio', 'imagen', 'estado' , 'archivo_url'];

    public $id;
    public $titulo;
    public $autor;
    public $categoria;
    public $anio;
    public $imagen;
    public $estado;
    public $archivo_url;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->autor = $args['autor'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->anio = $args['anio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->archivo_url = $args['archivo_url'] ?? '';
    }

    public static function getAllActiveBooks(): array
    {
        $sql = "SELECT * FROM " . self::$tabla . " WHERE estado = 'ACT'";
        return self::consultarSQL($sql);
    }

    public static function getActiveBooksWithLimit($limit = 4): array
    {
        $sql = "SELECT * FROM " . self::$tabla . " WHERE estado = 'ACT' LIMIT {$limit}";
        return self::consultarSQL($sql);
    }

    public static function getBookById($id)
    {
        $sql = "SELECT * FROM " . self::$tabla . " WHERE id = ${id}";
        return self::consultarSQL($sql);
    }

    public static function getBookCategoriesWithLimit()
    {
        $sql = "SELECT categoria FROM " . self::$tabla . " ORDER BY id ASC LIMIT 4";
        return self::consultarSQL($sql);
    }

    public static function getPaginatedBooks($limit, $offset){
        $sql = "SELECT * FROM " . self::$tabla . " WHERE estado = 'ACT' LIMIT ${limit} OFFSET ${offset}";
        return self::consultarSQL($sql);
    }

}

