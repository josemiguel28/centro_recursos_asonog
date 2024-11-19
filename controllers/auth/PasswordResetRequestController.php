<?php

namespace Controller\auth;

use Clases\Email;
use Clases\Request;
use Model\ActiveRecord;
use Model\Usuario;
use MVC\Router;

class PasswordResetRequestController extends ActiveRecord
{
    /**
     * Maneja la solicitud de restablecimiento de contraseña.
     *
     * Este metodo procesa la solicitud de restablecimiento de contraseña validando la entrada del usuario,
     * encontrando al usuario registrado y procesando la solicitud si se encuentra al usuario.
     * Renderiza la vista correspondiente con alertas según el resultado.
     *
     * @param Router $router La instancia del router para renderizar vistas.
     * @return void
     */
    public static function requestReset(Router $router): void
    {
        $alertas = [];

        if (isPostBack()) {

            $auth = new Usuario($_POST);

            $user = self::findRegisteredUser('correo', $auth->correo);

            if (!$user) {
                $alertas = Usuario::getAlertas();
                $router->render('auth/olvidePassword', ["alertas" => $alertas]);
                return;
            }

            self::processRequest($user);

            $alertas = Usuario::getAlertas();
            $router->render('auth/olvidePassword', ["alertas" => $alertas]);
        } else {
            $router->render('auth/olvidePassword', ["alertas" => $alertas]);
        }
    }

    public static function findRegisteredUser($column, $value)
    {
        $USER_CONFIRMED = '1';
        $USER_ACTIVE = 'ACT';

        //verificar que el usuario exista
        $usuario = Usuario::where($column, $value);

        if ($usuario && $usuario->confirmado === $USER_CONFIRMED && $usuario->estado === $USER_ACTIVE) {
            return $usuario;
        }

        Usuario::setAlerta('error', 'La cuenta no existe o no está confirmada');
        return null;
    }

    private static function processRequest(Usuario $user): bool
    {
        try {
            $user->createToken();
            $user->guardar();
            self::sendEmail($user);
            Usuario::setAlerta('success', 'Revisa tu correo para restablecer tu contraseña');
            return true;
        } catch (\Exception $e) {
            Usuario::setAlerta('fail', 'Ocurrió un error al procesar tu solicitud. Inténtalo de nuevo más tarde.');
            return false;
        }
    }

    private static function sendEmail(Usuario $user): void
    {
        $email = new Email($user->correo, $user->nombre, $user->token, $user->rol);
        $email->restablecerContrasena();
    }
}

