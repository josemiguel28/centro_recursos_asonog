<?php

namespace Controller\auth;

use Clases\Request;
use Model\Usuario;
use MVC\Router;

class ConfirmarCuenta
{

    /**
     * Muestra el mensaje de confirmación de cuenta.
     *
     * @param Router $router
     * @return void
     */
    public static function mensaje(Router $router): void
    {
        $router->render('auth/mensaje');
    }

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
            Usuario::setAlerta('text-red-500 bg-red-100', "Error, token no válido");
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

            $passwordTemporal = $_POST['tmpPassword'] ?? '';
            $nuevaPassword = $_POST['contrasena'] ?? '';

            if (!$usuario->comprobarTmpPassword($passwordTemporal)) {
                Usuario::setAlerta('text-red-500 bg-red-100', "Contraseña temporal incorrecta.");
                return;
            }

            if (empty($nuevaPassword) || strlen($nuevaPassword) < 6) {
                Usuario::setAlerta('text-red-500 bg-red-100', "La nueva contraseña debe tener al menos 6 caracteres.");
                return;
            }

            // Hashear la nueva contraseña y actualizar los datos del usuario
            $usuario->contrasena = $nuevaPassword;
            $usuario->estado = "ACT";
            $usuario->confirmado = "1";
            $usuario->hashPassword();
            $usuario->token = '';
            $_SESSION['token'] = '';
            $usuario->guardar();

            Usuario::setAlerta('text-green-500 bg-green-100', "Cuenta activada correctamente. Dirigase a <a class='underline' href='/login'>Iniciar Sesion</a> .");
        }
    }
}
