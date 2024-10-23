<?php

namespace MVC\models;

use Model\ActiveRecord;

class DocumentosResponsable extends ActiveRecord
{
    protected static $tabla = 'documentos_tecnicos';
    protected static $columnasDB = ['id_documento', 'id_tecnico_responsable'];

    public $id_documento;
    public $id_tecnico_responsable;

    public function __construct($args = [])
    {
        $this->id_documento = $args['id_documento'] ?? null;
        $this->id_tecnico_responsable = $args['id_tecnico_responsable'] ?? '';
    }

}