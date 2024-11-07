<?php

namespace App\Enums;

enum TaskParticipantsRoleEnum: string
{
    case MAIN_DEVELOPER = "main_developer";
    case DEVELOPER = "developer";
    case QA = "qa";
    case DESIGNER = "designer";
    case OBSERVER = "observer";
}
