<?php

namespace MVC\models;

use Model\ActiveRecord;

class DocumentosTecnicos extends ActiveRecord
{

    protected static $tabla = 'documentos_tecnicos';
    protected static $columnasDB = ['id', 'nombre_herramienta', 'descripcion','tipo_herramienta', 'tematica', 'tecnico', 'imagen', 'fecha_emision', 'archivo_url'];

    public $id;
    public $nombre_herramienta;
    public $descripcion;
    public $tipo_herramienta;
    public $tematica;
    public $tecnico;
    public $imagen;
    public $fecha_emision;
    public $archivo_url;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_herramienta = $args['nombre_herramienta'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipo_herramienta = $args['tipo_herramienta'] ?? '';
        $this->tematica = $args['tematica'] ?? '';
        $this->tecnico = $args['tecnico'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->fecha_emision = $args['fecha_emision'] ?? '';
        $this->archivo_url = $args['archivo_url'] ?? '';
    }

    public static function getAllDocumentos($limit = 10){
        $sql = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre tipo_herramienta, 
            tematicas.nombre tematica,
            tecnicos_responsables.nombre tecnico,
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
            ON tematicas.id = documentos.id_tematica WHERE documentos.estado = 'ACT' LIMIT {$limit};";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function getPaginatedDocuments($limit = 10, $offset = 0){
        $sql = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre tipo_herramienta, 
            tematicas.nombre tematica,
            tecnicos_responsables.nombre tecnico,
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
            ON tematicas.id = documentos.id_tematica WHERE documentos.estado = 'ACT' LIMIT {$limit} OFFSET {$offset};";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function filterDocumentsByTematica($tematica, $limit = 10, $offset = 0){
        $sql = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre tipo_herramienta, 
            tematicas.nombre tematica,
            tecnicos_responsables.nombre tecnico,
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
            ON tematicas.id = documentos.id_tematica WHERE documentos.estado = 'ACT' AND tematicas.id = {$tematica} LIMIT {$limit} OFFSET {$offset};";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function filterDocumentsByHerramienta($herramienta, $limit = 10, $offset = 0){
        $sql = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre tipo_herramienta, 
            tematicas.nombre tematica,
            tecnicos_responsables.nombre tecnico,
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
            ON tematicas.id = documentos.id_tematica WHERE documentos.estado = 'ACT' AND tipos_herramienta.id = {$herramienta} LIMIT {$limit} OFFSET {$offset};";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function searchDocument($search){
        $sql = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre tipo_herramienta, 
            tematicas.nombre tematica,
            tecnicos_responsables.nombre tecnico,
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
            ON tematicas.id = documentos.id_tematica
            
            WHERE (documentos.nombre_herramienta LIKE '%{$search}%' 
            OR tecnicos_responsables.nombre LIKE '%{$search}%'
            OR tematicas.nombre LIKE '%{$search}%'
            OR tipos_herramienta.nombre LIKE '%{$search}%') 
            AND documentos.estado = 'ACT';";

        return DocumentosTecnicos::SQL($sql);
    }
}