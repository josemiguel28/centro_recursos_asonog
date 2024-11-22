<?php

namespace Clases;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;
    public $rol;

    /**
     * @param string $email La dirección de correo electrónico del destinatario.
     * @param string $nombre El nombre del destinatario.
     * @param string $token El token para la confirmación de cuenta o restablecimiento de contraseña.
     * @param string $rol El rol del usuario (1 para Administrador, 2 para Colaborador).
     */
    public function __construct($email, $nombre, $token, $rol)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
        $this->rol = $rol;

        $this->rol = match ($rol) {
            '1' => 'Administrador',
            '2' => 'Colaborador'
        };

    }

    /**
     * Configura la instancia de PHPMailer con la configuración SMTP.
     *
     * @return PHPMailer La instancia de PHPMailer configurada.
     */
    private function setupMailer()
    {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = $_ENV["EMAIL_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["EMAIL_PORT"];
        $mail->Username = $_ENV["EMAIL_USERNAME"];
        $mail->Password = $_ENV["EMAIL_PASSWORD"];

        $mail->setFrom($_ENV["EMAIL_USERNAME"]);
        $mail->addAddress("$this->email");
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        return $mail;
    }

    /**
     * Envía un correo electrónico de confirmación de cuenta.
     *
     * @throws Exception Si hay un error al enviar el correo electrónico.
     */
    public function enviarEmail(): void
    {
        $mail = $this->setupMailer();
        $mail->Subject = 'Confirma tu cuenta | Centro de recursos para la gestión del conocimiento';

// Contenido del correo electrónico
        $contenido = "<html>";
        $contenido .= "<head>";
        $contenido .= "<style>";
        $contenido .= "body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2f2f2;}";
        $contenido .= ".container {width: 80%; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #ffffff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}";
        $contenido .= ".logo {display:flex; justify-content:flex-end;}";
        $contenido .= ".message {font-size: 1.2em; line-height: 1.5; margin-bottom: 20px;}";
        $contenido .= ".button {background-color: #FFD700; border: none; color: white; padding: 0.75rem 1.5rem; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 20px 0; cursor: pointer; border-radius: 9999px;}";
        $contenido .= ".footer {font-size: 0.9em; color: #888; margin-top: 20px; text-align: center;}";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='container'>";
        $contenido .= "<div class='logo'><img src='" . $_ENV['APP_URL'] . "/build/img/logo_img.webp' alt='Centro de Recursos' style='max-width: 10%; height: auto; margin-right: 2rem;' ></div>";
        $contenido .= "<p class='message' style='font-size: 1.50rem;'><strong>Hola, {$this->nombre}</strong></p>";
        $contenido .= "<p class='message'>¡Bienvenido! Tu cuenta como <strong>{$this->rol}</strong> ha sido creada con éxito para acceder al repositorio.</p>";
        $contenido .= "<p class='message'>Para activar tu cuenta, por favor confirma tu correo haciendo clic en el siguiente botón:</p>";
        $contenido .= "<a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token={$this->token}' class='button'>Confirmar cuenta</a>";
        $contenido .= "<p>Si no has solicitado esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido .= "<p class='footer'>CRGC | ASONOG,<br>Equipo de soporte</p>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }

    /**
     * Envía un correo electrónico para restablecer la contraseña.
     *
     * @throws Exception Si hay un error al enviar el correo electrónico.
     */
    public function restablecerContrasena(): void
    {
        $mail = $this->setupMailer();
        $mail->Subject = 'Restablece tu contraseña | Centro de recursos para la gestión del conocimiento';

        // Contenido del correo electrónico
        $contenido = "<html>";
        $contenido .= "<head>";
        $contenido .= "<style>";
        $contenido .= "body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2f2f2;}";
        $contenido .= ".container {width: 80%; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #ffffff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}";
        $contenido .= ".logo {text-align: center; margin-bottom: 20px;}";
        $contenido .= ".message {font-size: 1.2em; line-height: 1.5; margin-bottom: 20px;}";
        $contenido .= ".button {background-color: #FFD700; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 20px 0; cursor: pointer; border-radius: 5px;}";
        $contenido .= ".footer {font-size: 0.9em; color: #888; margin-top: 20px; text-align: center;}";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='container'>";
        $contenido .= "<div class='logo'><img src='/build/img/aboutUs.png' alt='Centro de Recursos' style='max-width: 100%; height: auto;'></div>";
        $contenido .= "<p class='message'><strong>Hola, {$this->nombre} 👋 </strong></p>";
        $contenido .= "<p class='message'>Recibimos una solicitud para restablecer tu contraseña en nuestra plataforma.</p>";
        $contenido .= "<p class='message'>Si deseas continuar con el proceso, simplemente haz clic en el botón a continuación. Esto te llevará a una página donde podrás configurar una nueva contraseña de forma segura:</p>";
        $contenido .= "<a href='" . $_ENV['APP_URL'] . "/recuperar?token={$this->token}' class='button'>Restablecer Contraseña</a>";
        $contenido .= "<p class='message'>Si no realizaste esta solicitud, puedes ignorar este mensaje. Tu cuenta continuará segura y no se realizarán cambios.</p>";
        $contenido .= "<p class='footer'>Centro de Recursos para la gestión del conocimiento | ASONOG,<br>El equipo de soporte</p>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }
}