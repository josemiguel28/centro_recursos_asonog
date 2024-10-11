<?php

namespace Controller\rol;

use Model\ActiveRecord;
use MVC\models\Roles;

class RolesController extends ActiveRecord
{
    public static function getAvailableRoles(): array
    {
        return Roles::getAvailableRoles();
    }
}