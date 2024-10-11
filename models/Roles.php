<?php

namespace MVC\models;

use Model\ActiveRecord;

class Roles extends ActiveRecord
{
    protected static $tabla = 'roles';
    protected static $columnasDB = ['id', 'nombre', 'descripcion'];

    public $id;
    public $nombre;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public static function getAvailableRoles(): array
    {
        $query = "SELECT * FROM " . self::$tabla . " ;";
        $roles = self::consultarSQL($query);
        return $roles;
    }

}