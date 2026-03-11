<?php

namespace Controller\admin\usuarios;

use Model\ActiveRecord;
use Model\Usuario;

class UpdateUserController extends ActiveRecord
{
    public static function actualizarUsuario($args,$usuario): void
    {
        try {
            $usuario->sincronizar($args);

            $usuario->guardar();

            setFlashAlerta('success', 'Usuario con correo ' . $usuario->correo . ' actualizado correctamente.');
            header('Location: /usuarios/gestionar');
            exit;
        }catch (\Exception $e){
            Usuario::setAlerta('fail', 'Error al actualizar el usuario.');
        }
    }
}