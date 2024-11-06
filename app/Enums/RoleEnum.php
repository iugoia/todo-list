<?php

namespace App\Enums;

enum RoleEnum: string
{
    case USER = 'user';
    case MANAGER = 'manager';
    case ADMIN = 'admin';
    case SUPER_ADMIN = 'super_admin';
}
