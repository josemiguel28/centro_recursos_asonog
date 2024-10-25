<?php

namespace Controller\admin\usuarios;

use Clases\Request;
use Model\ActiveRecord;
use Model\Usuario;

class ActualizarUsuarioController extends ActiveRecord
{

    public static function actualizarUsuario($args,$usuario): void
    {
        try {
            $usuario->sincronizar($args);

            $usuario->guardar();

            Usuario::setAlerta('text-green-500 bg-green-100', 'Usuario actualizado correctamente.');
        }catch (\Exception $e){
            Usuario::setAlerta('text-red-500 bg-red-100', 'Error al actualizar el usuario.');
        }
    }
}