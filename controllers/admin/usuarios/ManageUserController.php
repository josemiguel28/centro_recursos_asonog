<?php

namespace Controller\admin\usuarios;

use Clases\Request;
use Controller\rol\RolesController;
use Model\ActiveRecord;
use Model\Usuario;
use MVC\Router;

class ManageUserController extends ActiveRecord
{
    public static function index(Router $router)
    {
        $usuarios = Usuario::getAllUsers();

        $router->render('admin/usuarios/gestion_usuarios',
            [
                'usuarios' => $usuarios
            ]
        );
    }

    /**
     * Metodo estatico para gestionarUsuario las operaciones de usuario en la aplicación.
     *
     * Este metodo controla las acciones de crear, actualizar y eliminar usuarios
     * según la acción especificada en la URL. Realiza la validación y obtiene
     * información adicional como roles de usuario y alertas del sistema.
     *
     * @param Router $router Instancia del enrutador para renderizar la vista.
     *
     * @return void
     *
     * @uses self::setFormTitle() para obtener el título de la página basado en la acción.
     * @uses self::getUsuarioById() para obtener el usuario de la base de datos según el ID.
     * @uses RolesController::getAvailableRoles() para obtener los roles disponibles y mostrarlos en el formulario.
     * @uses Usuario::setAlerta() para definir alertas en caso de errores o mensajes.
     * @uses Usuario::getAlertas() para recuperar alertas del sistema.
     *
     * @example
     * // Ejemplo de URL con acción de actualización de usuario:
     * // https://example.com/usuario?mode=UPD&id=1
     */
    public static function gestionarUsuario(Router $router): void
    {
        $request = new Request();
        $formAction = $request->get('mode');
        $getUserIdFromUrl = $request->get('id');

        // Establece el título de la página según la acción solicitada
        $formTitle = setFormTitle($formAction);

        $usuario = self::getUsuarioByIdFromDb($getUserIdFromUrl);
        $roles = RolesController::getAvailableRoles();

        if (isPostBack()) {
            switch ($formAction) {
                case 'INS':
                    CreateUserController::crearCuenta($_POST);
                    break;
                case 'UPD':
                    if ($usuario) {
                        UpdateUserController::actualizarUsuario($_POST, $usuario);
                    } else {
                        Usuario::setAlerta('text-red-500 bg-red-100', 'Usuario no encontrado.');
                    }
                    break;
                case 'DEL':
                    if ($usuario) {
                        DeleteUserController::eliminarUsuario($usuario);
                    } else {
                        Usuario::setAlerta('text-red-500 bg-red-100', 'Usuario no encontrado.');
                    }
                    break;
                default:
                    header('Location: /usuarios/gestionarUsuario');
                    break;
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('admin/usuarios/formulario_usuarios', [
            'usuario' => $usuario,
            'title' => $formTitle,
            'mode' => $formAction,
            'roles' => $roles,
            'alertas' => $alertas
        ]);
    }

    private static function getUsuarioByIdFromDb($id) {
        return Usuario::where('id', $id);
    }

}