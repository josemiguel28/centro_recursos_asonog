<?php

namespace MVC\models;

use Model\ActiveRecord;

class Tecnicos extends ActiveRecord
{
        protected static $tabla = 'tecnicos_responsables';
        protected static $columnasDB = ['id', 'nombre'];

        public $id;
        public $nombre;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->nombre = $args['nombre'] ?? '';
        }

    public static function getAllTecnicos()
    {
        $query = "SELECT * FROM " . self::$tabla . " ORDER BY nombre ASC;";
        return self::consultarSQL($query);
    }

}