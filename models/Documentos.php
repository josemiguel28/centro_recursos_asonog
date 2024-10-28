<?php

namespace MVC\models;

use Model\ActiveRecord;

class Documentos extends ActiveRecord
{

    protected static $tabla = 'documentos';
    protected static $columnasDB = ['id', 'nombre_herramienta', 'descripcion', 'id_tipo_herramienta', 'id_tematica', 'imagen', 'estado', 'fecha_emision', 'archivo_url'];

    public $id;
    public $nombre_herramienta;
    public $descripcion;
    public $archivo_url;
    public $imagen;
    public $fecha_emision;
    public $id_tematica;
    public $id_tipo_herramienta;
    public $estado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_herramienta = $args['nombre_herramienta'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->archivo_url = $args['archivo_url'] ?? '';
        $this->fecha_emision = $args['fecha_emision'] ?? '';
        $this->id_tematica = $args['id_tematica'] ?? '';
        $this->id_tipo_herramienta = $args['id_tipo_herramienta'] ?? '';
        $this->estado = $args['estado'] ?? 'ACT';
        $this->imagen = $args['imagen'] ?? '';
    }

    public static function getAllDocumentos()
    {
        $query = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre, 
            tematicas.nombre,
            tecnicos_responsables.nombre,
            documentos.imagen, 
            documentos.fecha_emision, 
            documentos.archivo_url FROM documentos
            JOIN documentos_tecnicos  
            ON documentos_tecnicos.id_documento = documentos.id
            JOIN tecnicos_responsables
            ON tecnicos_responsables.id = documentos_tecnicos.id_tecnico_responsable
            JOIN tipos_herramienta 
            ON tipos_herramienta.id = documentos.id_tipo_herramienta
            JOIN tematicas 
            ON tematicas.id = documentos.id_tematica WHERE documentos.estado = 'ACT';";

        return Documentos::SQL($query);
    }

    public static function getDocumentosPorUsuario($id_usuario)
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE id_usuario = " . $id_usuario;
        return self::consultarSQL($query);
    }

    public static function getDocumentosPorTematica($id_tematica)
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE id_tematica = " . $id_tematica;
        return self::consultarSQL($query);
    }

    public static function getDocumentosPorTipoHerramienta($id_tipo_herramienta)
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE id_tipo_herramienta = " . $id_tipo_herramienta;
        return self::consultarSQL($query);
    }

    public static function getTotalDocuments()
    {
        $query = "SELECT * FROM " . self::$tabla;
        return self::consultarSQL($query);
    }

    public function setFileName($nombre, $tipo): void
    {
        if (isset($this->id)) {
            // $this->deleteImage();
        }
        //asignar al atributo de la imagen el nombre de la imagen

        switch ($tipo) {
            case 'imagen':
                $this->imagen = $nombre;
                break;
            case 'archivo':
                $this->archivo_url = $nombre;
                break;
        }
    }
}