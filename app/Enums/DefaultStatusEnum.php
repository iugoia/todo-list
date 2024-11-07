<?php

namespace App\Enums;

enum DefaultStatusEnum: string
{
    case PENDING = "pending";
    case ACCEPTED = "accepted";
    case REJECTED = "rejected";
}
