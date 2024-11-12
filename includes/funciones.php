<?php

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

//funcion para verificar si un SERVER es igual a un POST
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

//funcion para verificar si el usuario esta autenticado
function isUserAuth() : void{
    if(!isset($_SESSION["login"])){
        header("Location: /");
    }
}

function isAdmin(){
    if(!isset($_SESSION["admin"]))
    {
        header("Location: /");
    }
}

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


