<?php

namespace Controller\admin\usuarios;

use Clases\Request;
use Model\ActiveRecord;
use Model\Usuario;

class UpdateUserController extends ActiveRecord
{

    public static function actualizarUsuario($args,$usuario): void
    {
        try {
            $usuario->sincronizar($args);

            $usuario->guardar();

            Usuario::setAlerta('success', 'Usuario actualizado correctamente.');
        }catch (\Exception $e){
            Usuario::setAlerta('fail', 'Error al actualizar el usuario.');
        }
    }
}