<?php

namespace App\Enums;

enum BoardRoleEnum: string
{
    case ADMIN = 'admin';
    case MEMBER = 'member';
    case VIEWER = 'viewer';
}
