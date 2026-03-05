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
        $query = "SELECT id, nombre FROM " . self::$tabla .
            " WHERE nombre <> 'N/A' 
         ORDER BY 
             CASE 
                 WHEN id = 57 THEN 1 
                 ELSE 0 
             END, 
             id";

        return self::consultarSQL($query);
    }
}