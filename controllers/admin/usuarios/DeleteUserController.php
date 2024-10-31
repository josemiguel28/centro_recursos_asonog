<?php

namespace Controller\admin\usuarios;

use Model\ActiveRecord;
use Model\Usuario;

class DeleteUserController extends ActiveRecord
{
    public static function eliminarUsuario($usuario): void
    {
        try {

            $usuario->eliminar();

            Usuario::setAlerta('text-green-500 bg-green-100', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            Usuario::setAlerta('text-red-500 bg-red-100', 'Error al eliminar el usuario.');
        }
    }

}