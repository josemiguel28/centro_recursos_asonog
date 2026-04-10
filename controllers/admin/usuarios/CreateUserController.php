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
            setFlashAlerta('success', 'Usuario creado correctamente. Se ha enviado un correo con las instrucciones para configurar su cuenta.');
            header('Location: /usuarios/gestionar');
            exit;
        } else {
            $alertas = Usuario::getAlertas();
        }
    }

    private static function procesarUsuario(Usuario $usuario)
    {
        if ($usuario->isUserRegistered()) {
            Usuario::setAlerta('fail', 'El usuario ya se encuentra registrado');
            return false;
        }

        $tmpPassword = $usuario->generarContrasenaTemporal();
        $usuario->hashPassword();
        $usuario->createToken();

        if (!$usuario->guardar()) {
            return false;
        }

        self::enviarEmail($usuario);

        return true;
    }

    private static function enviarEmail(Usuario $usuario): void
    {
        try {
            $email = new Email($usuario->correo, $usuario->nombre, $usuario->token, $usuario->rol);
            $email->enviarEmail();
            error_log("[Email] SUCCESS - Correo enviado a: {$usuario->correo} | Usuario: {$usuario->nombre}");
        } catch (\Exception $e) {
            error_log("[Email] FAILED  - Destinatario: {$usuario->correo} | Error: {$e->getMessage()}");
            setFlashAlerta('warning', 'Usuario creado, pero no se pudo enviar el correo de confirmación. Contacte al administrador.');
        }
    }
}