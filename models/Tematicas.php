<?php

namespace MVC\models;

use Model\ActiveRecord;

class Tematicas extends ActiveRecord
{

    protected static $tabla = 'tematicas';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public static function getAllTematicas()
    {
        $query = "SELECT * FROM " . self::$tabla;
        return self::consultarSQL($query);
    }

}