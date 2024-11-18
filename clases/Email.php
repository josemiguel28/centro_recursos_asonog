<?php

namespace Clases;

use Controller\auth\LoginController;
use Model\Usuario;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;
    public $rol;


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

    private function setupMailer()
    {
        // crear una instancia de phpmailer
        $mail = new PHPMailer();

        //configurar SMTP
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
     * @throws Exception
     */
    public function enviarEmail(): void
    {
        $mail = $this->setUpMailer();
        $mail->Subject = 'Confirma tu cuenta';

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
        $contenido .= "<div class='logo'><img src='URL_DE_TU_LOGO' alt='Centro de Recursos' style='max-width: 100%; height: auto;'></div>";
        $contenido .= "<p class='message'><strong>Hola, {$this->nombre}</strong></p>";
        $contenido .= "<p class='message'>Se ha creado tu cuenta de <strong> {$this->rol} </strong> para acceder al repositorio.</p>";
        $contenido .= "<p class='message'>Por favor, confirma tu cuenta haciendo clic en el botón a continuación:</p>";
        $contenido .= "<a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token={$this->token}' class='button'>Confirmar cuenta</a>";
        $contenido .= "<p>Si no solicitaste esta cuenta, ignora este mensaje.</p>";
        $contenido .= "<p class='footer'>Centro de Recursos | ASONOG,<br>El equipo de soporte</p>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";


        $mail->Body = $contenido;
        $mail->send();
    }

    public function restablecerContrasena(): void
    {
        $mail = $this->setUpMailer();
        $mail->Subject = 'Restablece tu contraseña | Centro de recursos para la gestión del conocimiento';

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