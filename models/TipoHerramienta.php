<?php

namespace MVC\models;

use Model\ActiveRecord;

class TipoHerramienta extends ActiveRecord
{

    protected static $tabla = 'tipos_herramienta';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public static function getAllHerramientas()
    {
        $query = "SELECT * FROM " . self::$tabla;
        return self::consultarSQL($query);
    }
}