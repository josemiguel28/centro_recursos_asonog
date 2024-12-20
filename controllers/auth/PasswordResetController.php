<?php

namespace Controller\auth;

use Clases\Request;
use Model\Usuario;
use MVC\Router;

class PasswordResetController
{
    public static function changePassword(Router $router): void
    {

        if (!self::isTokenValid()) {
            $error = true;
            $alertas = Usuario::getAlertas();

            $router->render('auth/recuperar-password', ["alertas" => $alertas, "error" => $error]);
            return;
        }

        $passwordSucces = self::saveNewPassword();
        
        if ($passwordSucces) {
            redirectToWithMsg('/login', 'La contraseña se actualizo correctamente');
        }
        
        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar-password', [
            "alertas" => $alertas
        ]);
    }

    private static function isTokenValid()
    {
        $token = '';
        $request = new Request();
        $token = $request->get('token');

        //buscar usuario por token
        $usuario = Usuario::where('token', $token);

        if (empty($usuario) || empty($token)) {
            Usuario::setAlerta('error', 'Token no valido');
            return false;
        }

        return $usuario;
    }

    private static function saveNewPassword()
    {
        if (isPostBack()) {

            //leer la nueva contraseña
            $newPassword = new Usuario($_POST);

            $usuario = self::isTokenValid();

            $alertas = $usuario->validarPassword($newPassword->contrasena);

            if (empty($alertas)) {
                $usuario->contrasena = null;
                $usuario->contrasena = $newPassword->contrasena;
                $usuario->token = '';

                $usuario->hashPassword();

                return $usuario->guardar();
                
            }
        }

    }
}