<?php

namespace Controller\auth;

use Clases\Request;
use Model\Usuario;
use MVC\Router;

class ConfirmarCuenta
{

    /**
     * Valida el token proporcionado en la URL y lo guarda en la sesión.
     *
     * @return Usuario|null Retorna el usuario correspondiente si el token es válido, o null si no lo es.
     */
    private static function validarToken(): ?Usuario
    {
        $request = new Request();
        session_start();
        $tokenFromURL = $request->get("token") ?? $_SESSION['token'] ?? '';

        $usuario = Usuario::where('token', $tokenFromURL);

        if (!$usuario || empty($usuario->token)) {
            return null;
        }

        // Guardar el token en la sesión
        $_SESSION['token'] = $tokenFromURL;

        return $usuario;
    }

    /**
     * Confirma la cuenta del usuario utilizando el token proporcionado.
     *
     * @param Router $router Instancia del router para renderizar la vista.
     * @return void
     */
    public static function confirmarCuenta(Router $router): void
    {
        $alertas = [];

        $usuario = self::validarToken();

        if (!$usuario) {
            Usuario::setAlerta('', "Token no válido");
        } else {
            self::setNewPassword($usuario);
        }

        $alertas = Usuario::getAlertas();

        $router->render(
            'auth/confirmar-cuenta',
            [
                'alertas' => $alertas
            ]
        );
    }

    /**
     * Establece una nueva contraseña para el usuario validando la contraseña temporal.
     *
     * @param Usuario $usuario El usuario al que se le cambiará la contraseña.
     * @return void
     */
    private static function setNewPassword(Usuario $usuario): void
    {
        if (isPostBack()) {
            session_start();

            $nuevaPassword = $_POST['contrasena'] ?? '';

            if (empty($nuevaPassword) || strlen($nuevaPassword) < 6) {
                Usuario::setAlerta('fail', "La nueva contraseña debe tener al menos 6 caracteres.");
                return;
            }

            // Hashear la nueva contraseña y actualizar los datos del usuario
            $usuario->contrasena = $nuevaPassword;
            $usuario->hashPassword();
            $usuario->estado = "ACT";
            $usuario->confirmado = "1";
            $usuario->token = '';
            $_SESSION['token'] = '';
            $usuario->guardar();

            Usuario::setAlerta('success',
                "Cuenta activada correctamente. <a class='underline font-semibold' href='/login?email={$usuario->correo}'>Iniciar Sesion</a> .");
        }
    }
}
