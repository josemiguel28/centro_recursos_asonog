<?php

namespace Controller\admin\usuarios;

use Clases\Email;
use Model\ActiveRecord;
use Model\Usuario;

class CreateUserController extends ActiveRecord
{

    public static function crearCuenta($args): void
    {
        $usuario = new Usuario();

        $usuario->sincronizar($args);
        //$alertas = $usuario->validarDatosNuevaCuenta();

        if (self::procesarUsuario($usuario)) {
            Usuario::setAlerta('text-green-500 bg-green-100', 'Usuario creado correctamente. Se ha enviado un correo al usuario con las instrucciones para activar su cuenta.');
        } else {
            $alertas = Usuario::getAlertas();
        }
    }

    private static function procesarUsuario(Usuario $usuario)
    {
        if ($usuario->isUserRegistered()) {
            Usuario::setAlerta('text-red-500 bg-red-100', 'El usuario ya se encuentra registrado');
            return false;
        }

        $tmpPassword = $usuario->generarContrasenaTemporal();
        $usuario->hashPassword();
        $usuario->createToken();

        self::enviarEmail($usuario, $tmpPassword);

        return $usuario->guardar();
    }

    private static function enviarEmail(Usuario $usuario, $tmpPassword): void
    {
        $email = new Email($usuario->correo, $usuario->nombre, $usuario->token, $usuario->rol, $tmpPassword);
        $email->enviarEmail();
    }
}