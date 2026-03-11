<?php

namespace Controller\admin\usuarios;

use Model\ActiveRecord;
use Model\Usuario;

class DeleteUserController extends ActiveRecord
{
    public static function eliminarUsuario($usuario): void
    {
        try {
            $deleted_user_email = $usuario->correo; // Guardar el correo del usuario antes de eliminarlo
            $usuario->eliminar();

            setFlashAlerta('success', 'Usuario con correo ' . $deleted_user_email . ' eliminado correctamente.');
            header('Location: /usuarios/gestionar');
            exit;
        } catch (\Exception $e) {
            Usuario::setAlerta('text-red-500 bg-red-100', 'Error al eliminar el usuario.');
        }
    }

}