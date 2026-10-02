<?php

namespace App\Enums;

enum Priority: string
{
    case Critical = 'critical';
    case Normal = 'normal';
    case Bulk = 'bulk';
}
