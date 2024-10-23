<?php

namespace Controller\admin\usuarios;

use Model\ActiveRecord;
use Model\Usuario;
use MVC\Router;

class UsuariosController extends ActiveRecord
{

    public static function index(Router $router)
    {
        $usuarios = Usuario::getAllUsers();

        $router->render('admin/usuarios/index',
            [
                'usuarios' => $usuarios
            ]
        );
    }

}