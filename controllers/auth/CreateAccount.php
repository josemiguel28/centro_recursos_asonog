<?php

namespace Controller\auth;

use Clases\Email;
use Controller\rol\RolesController;
use Model\ActiveRecord;
use Model\Usuario;
use MVC\models\Roles;
use MVC\Router;

class CreateAccount extends ActiveRecord
{

    public static function crearCuenta(Router $router): void
    {
        $usuario = new Usuario();

        $alertas = [];

        $roles = RolesController::getAvailableRoles();

        if (isPostBack()) {

            $usuario->sincronizar($_POST);
            //$alertas = $usuario->validarDatosNuevaCuenta();

            if (self::procesarUsuario($usuario)) {
                Usuario::setAlerta('text-green-500 bg-green-100', 'Usuario creado correctamente. Se ha enviado un correo al usuario con las instrucciones para activar su cuenta.');
            } else {
                $alertas = Usuario::getAlertas();
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/crearCuenta', [
            "usuario" => $usuario,
            "alertas" => $alertas,
            "roles" => $roles
        ]);
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