<?php

namespace MVC\models;

use Model\ActiveRecord;

class Bitacora extends ActiveRecord
{
    protected static $tabla = 'bitacora_acceso';
    protected static $columnasDB = ['id', 'user_id', 'ip_adress', 'user_agent', 'operating_system' ,'fecha_acceso','sistema_operativo'];


    public $id;
    public $user_id;
    public $ip_adress;
    public $user_agent;
    public $operating_system;
    public $fecha_acceso;
    public $sistema_operativo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->user_id = $args['user_id'] ?? '';
        $this->ip_adress = $args['ip_adress'] ?? '';
        $this->user_agent = $args['user_agent'] ?? '';
        $this->operating_system = $args['operating_system'] ?? '';
        $this->fecha_acceso = $args['fecha_acceso'] ?? '';
        $this->sistema_operativo = $args['sistema_operativo'] ?? '';
    }


    public static function logAccess(int $userId, string $ip, string $userAgent, string $operating_system, $login_time): void
    {

        $sql = "INSERT INTO " . self::$tabla . " (user_id, ip_address, user_agent, operating_system , fecha_acceso) 
            VALUES ($userId, '$ip', '$userAgent', '$operating_system', '$login_time'); ";

        self::$db->query($sql);
    }


}