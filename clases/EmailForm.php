<?php

namespace Clases;

class EmailForm extends Email
{
    public function __construct()
    {
        parent::__construct();
    }

    public function enviarFormularioContacto(array $datos): void
    {
        $contenido = "<html>";
        $contenido .= "<head>";
        $contenido .= "<style>";
        $contenido .= "body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2f2f2;}";
        $contenido .= ".container {width: 80%; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #ffffff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}";
        $contenido .= ".logo {text-align: center; margin-bottom: 20px;}";
        $contenido .= ".message {font-size: 1.2em; line-height: 1.5; margin-bottom: 20px;}";
        $contenido .= ".footer {font-size: 0.9em; color: #888; margin-top: 20px; text-align: center;}";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='container'>";
        $contenido .= "<div class='logo'><img src='" . $_ENV['APP_URL'] . "/build/img/logo_img.webp' alt='Centro de Recursos' style='max-width: 10%; height: auto; margin-right: 2rem;' ></div>";
        $contenido .= "<p class='message'><strong>Hola, equipo de soporte 👋</strong></p>";
        $contenido .= "<p class='message'>Se ha recibido un nuevo mensaje desde el formulario de contacto:</p>";
        $contenido .= "<p class='message'><strong>Correo:</strong> " . htmlspecialchars($datos['correo'], ENT_QUOTES, 'UTF-8') . "</p>";
        $contenido .= "<p class='message'><strong>Tema:</strong> " . htmlspecialchars($datos['tema'], ENT_QUOTES, 'UTF-8') . "</p>";
        $contenido .= "<p class='message'><strong>Mensaje:</strong></p>";
        $contenido .= "<p class='message'>" . nl2br(htmlspecialchars($datos['mensaje'], ENT_QUOTES, 'UTF-8')) . "</p>";
        $contenido .= "<p class='footer'>Centro de Recursos para la gestión del conocimiento | ASONOG,<br>El equipo de soporte</p>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        \Resend::client($_ENV['RESEND_API_KEY'])->emails->send([
            'from'    => $_ENV['RESEND_FROM'],
            'to'      => $_ENV['RESEND_CONTACT_TO'],
            'subject' => "Nuevo mensaje: " . htmlspecialchars($datos['tema'], ENT_QUOTES, 'UTF-8') . " | CRGC",
            'html'    => $contenido,
        ]);
    }
}
