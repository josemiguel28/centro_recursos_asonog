<?php

namespace MVC\models;

use Model\ActiveRecord;

class DocumentosTecnicos extends ActiveRecord
{

    protected static $tabla = 'documentos_tecnicos';
    protected static $columnasDB = ['id', 'nombre_herramienta', 'descripcion','tipo_herramienta', 'tematica', 'tecnico', 'estado' ,'imagen', 'fecha_emision', 'archivo_url'];

    public $id;
    public $nombre_herramienta;
    public $descripcion;
    public $tipo_herramienta;
    public $tematica;
    public $tecnico;
    public $estado;
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
        $this->estado = $args['estado'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->fecha_emision = $args['fecha_emision'] ?? '';
        $this->archivo_url = $args['archivo_url'] ?? '';
    }

    public static function getAllDocumentosWithLimit($limit = 10){
        $sql = "SELECT documentos.id, 
       documentos.nombre_herramienta,
       documentos.descripcion,
       tipos_herramienta.nombre AS tipo_herramienta, 
       tematicas.nombre AS tematica,
       GROUP_CONCAT(tecnicos_responsables.nombre) AS tecnicos, -- Agrupa los técnicos en una sola columna
       documentos.imagen, 
       documentos.fecha_emision, 
       documentos.archivo_url 
            FROM documentos
            JOIN documentos_tecnicos  
            ON documentos_tecnicos.id_documento = documentos.id
            JOIN tecnicos_responsables
            ON tecnicos_responsables.id = documentos_tecnicos.id_tecnico_responsable
            JOIN tipos_herramienta 
            ON tipos_herramienta.id = documentos.id_tipo_herramienta
            JOIN tematicas 
            ON tematicas.id = documentos.id_tematica 
            WHERE documentos.estado = 'ACT'
            GROUP BY documentos.id
            LIMIT {$limit};";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function getAllDocumentos(){
        $sql = "SELECT documentos.id, 
       documentos.nombre_herramienta,
       documentos.descripcion,
       tipos_herramienta.nombre AS tipo_herramienta, 
       tematicas.nombre AS tematica,
       GROUP_CONCAT(tecnicos_responsables.nombre) AS tecnico, -- Agrupa los técnicos en una sola columna
       documentos.estado,
       documentos.imagen, 
       documentos.fecha_emision, 
       documentos.archivo_url
       
            FROM documentos
            JOIN documentos_tecnicos  
            ON documentos_tecnicos.id_documento = documentos.id
            JOIN tecnicos_responsables
            ON tecnicos_responsables.id = documentos_tecnicos.id_tecnico_responsable
            JOIN tipos_herramienta 
            ON tipos_herramienta.id = documentos.id_tipo_herramienta
            JOIN tematicas 
            ON tematicas.id = documentos.id_tematica 
            GROUP BY documentos.id order by documentos.id desc;";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function getDocumentById($id){
        $sql = "SELECT documentos.id, 
       documentos.nombre_herramienta,
       documentos.descripcion,
       tipos_herramienta.nombre AS tipo_herramienta, 
       tematicas.nombre AS tematica,
       tecnicos_responsables.id AS tecnico, -- Agrupa los técnicos en una sola columna
       documentos.imagen, 
       documentos.fecha_emision, 
       documentos.archivo_url,
       documentos.estado
            FROM documentos
            JOIN documentos_tecnicos  
            ON documentos_tecnicos.id_documento = documentos.id
            JOIN tecnicos_responsables
            ON tecnicos_responsables.id = documentos_tecnicos.id_tecnico_responsable
            JOIN tipos_herramienta 
            ON tipos_herramienta.id = documentos.id_tipo_herramienta
            JOIN tematicas 
            ON tematicas.id = documentos.id_tematica
            
            where documentos.id = {$id};";

        return DocumentosTecnicos::SQL($sql);
    }

    public static function getPaginatedDocuments($limit = 10, $offset = 0){
        $sql = "SELECT 
            documentos.id, 
            documentos.nombre_herramienta ,
            documentos.descripcion,
            tipos_herramienta.nombre tipo_herramienta, 
            tematicas.nombre tematica,
            GROUP_CONCAT(tecnicos_responsables.nombre) AS tecnicos, -- Agrupa los técnicos en una sola columna
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
            WHERE documentos.estado = 'ACT'
GROUP BY documentos.id

            LIMIT {$limit} OFFSET {$offset};";

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