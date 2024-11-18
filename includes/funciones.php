<?php

//define las rutas en donde se guardaran los archivos e imagenes
define("CARPETA_IMAGENES_LIBROS", $_SERVER["DOCUMENT_ROOT"] . '/imagenesLibros/');
define("CARPETA_LIBROS", $_SERVER["DOCUMENT_ROOT"] . '/libros/');
define("CARPETA_DOCUMENTOS", $_SERVER["DOCUMENT_ROOT"] . '/documentos/');
define("CARPETA_IMAGENES_DOCUMENTOS", $_SERVER["DOCUMENT_ROOT"] . '/imagenesDocumentos/');

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function sanitizar($html) : string {
    return htmlspecialchars($html, ENT_QUOTES);
}

function isPostBack() : bool
{
    return $_SERVER["REQUEST_METHOD"] == "POST";
    
}

//funcion para mostrar una alerta al usuario, y redirigirlo a una pagina
function redirectToWithMsg($url, $msg)
{
    echo '<script>alert("' . $msg . '");';
    echo ' window.location.assign("' . $url . '");</script>';
    die();
}

/**
 * Verifica si el usuario actual es un administrador.
 *
 * Esta función comprueba si el rol del usuario almacenado en la sesión es el de un administrador.
 * Si el usuario no es un administrador, se le redirige a la página de colaborador.
 */
function isAdmin() {
    $ADMIN_ROL = "1"; // Define el identificador del rol de administrador

    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== $ADMIN_ROL) {
        header("Location: /colaborador");
        exit;
    }
}

/**
 * Establece el título del formulario basado en la acción dada.
 *
 * Esta función toma un código de acción y devuelve el título correspondiente del formulario.
 *
 * @param string $action El código de acción (por ejemplo, 'DSP', 'INS', 'UPD', 'DEL').
 * @return string El título correspondiente del formulario.
 */
function setFormTitle($action): string
{
    $modes = [
        'DSP' => 'Detalles',
        'INS' => 'Registrar',
        'UPD' => 'Actualizar',
        'DEL' => 'Eliminar'
    ];

    return $modes[$action];
}


