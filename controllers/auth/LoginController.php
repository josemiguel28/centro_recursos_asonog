<?php

namespace Controller\auth;

use Clases\Email;
use Clases\Request;
use JetBrains\PhpStorm\NoReturn;
use Model\ActiveRecord;
use Model\Usuario;
use MVC\models\Bitacora;
use MVC\Router;
use PHPMailer\PHPMailer\Exception;

class LoginController extends ActiveRecord
{
    public static function login(Router $router): void
    {
        $auth = new Usuario();
        $request = new Request();
        $userEmail = $request->get("email");

        $alertas = [];

        if (isPostBack()) {

            $auth->sincronizar($_POST);
            $alertas = $auth->validarLoginInputs();

            if (empty($alertas)) {
                if (self::attemptLogin($auth)) {
                    return; // Redirige al usuario y termina el metodo
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render("auth/login", [
            "alertas" => $alertas,
            "userEmail" => $userEmail,
            "auth" => $auth,
            "titlePage" => "Iniciar Sesión"
        ]);
    }

    /**
     * Intenta iniciar sesión de un usuario.
     *
     * Este metodo verifica si el usuario existe y si la contraseña es correcta.
     * Si tiene éxito, autentica al usuario.
     *
     * @param Usuario $auth Los datos de autenticación del usuario.
     * @return bool True si el inicio de sesión es exitoso, false en caso contrario.
     */
    private static function attemptLogin(Usuario $auth): bool
    {
        $usuario = Usuario::where("correo", $auth->correo);

        if ($usuario && $usuario->comprobarPasswordAndVerificado($auth->contrasena)) {
            self::authenticateUser($usuario);
            return true;
        }

        Usuario::setAlerta('', 'El usuario no existe o la contraseña es incorrecta');
        return false;
    }

    /**
     * Autentica a un usuario e inicializa la sesión.
     *
     * Este metodo inicia una sesión si no está ya iniciada, recupera la dirección IP del usuario,
     * el agente de usuario y el sistema operativo, y almacena estos detalles junto con la información
     * del usuario en la sesión. También registra el acceso y redirige al usuario según su rol.
     *
     * @param Usuario $user El usuario a autenticar.
     * @return void
     */
    private static function authenticateUser(Usuario $user): void
    {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        try {

            $ip_address = self::getUserIp();
            $user_agent = self::getUserAgent();
            $operating_system = self::getOperatingSystem($user_agent);

            // Manejo de la sesión
            $request = new Request();
            $request->session('id', $user->id);
            $request->session('nombre', $user->nombre . " " . $user->apellido);
            $request->session('email', $user->correo);
            $request->session('loggedAt', date('Y-m-d H:i:s'));
            $request->session('login', true);
            $request->session('ip_address', $ip_address);
            $request->session('user_agent', $user_agent);
            $request->session('operating_system', $operating_system);

            // Guardar el rol del usuario en la sesión
            $request->session('rol', $user->rol ?? null);

            Bitacora::logAccess($user->id, $ip_address, $user_agent, $operating_system, date('Y-m-d H:i:s'));

            // Redirección según el rol del usuario
            $redirectUrl = ($user->rol === '1') ? '/admin' : '/colaborador';
            header("Location: $redirectUrl");
            exit;
        } catch (Exception $e) {
            Usuario::setAlerta('text-red-500', 'Error al iniciar sesión: ' . $e->getMessage());
        }

    }

    private static function getUserIp(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    private static function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    private static function getOperatingSystem(string $userAgent): string
    {
        // Lista de patrones de sistemas operativos
        $osArray = [
            'Windows NT 10' => 'Windows 10',
            'Windows NT 6.3' => 'Windows 8.1',
            'Windows NT 6.2' => 'Windows 8',
            'Windows NT 6.1' => 'Windows 7',
            'Windows NT 6.0' => 'Windows Vista',
            'Windows NT 5.2' => 'Windows Server 2003',
            'Windows NT 5.1' => 'Windows XP',
            'Mac OS X' => 'Mac OS',
            'Linux' => 'Linux',
            'Ubuntu' => 'Ubuntu',
            'iPhone' => 'iOS',
            'iPad' => 'iOS',
            'Android' => 'Android',

        ];

        foreach ($osArray as $os => $osName) {
            if (stripos($userAgent, $os) !== false) {
                return $osName;
            }
        }

        return 'Desconocido'; // Si no se encuentra el sistema operativo
    }

    #[NoReturn] public static function logout(): void
    {
        session_start();

        $_SESSION = [];

        session_destroy();

        header("Location: /");
        exit;
    }
}