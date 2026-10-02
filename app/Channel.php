<?php

namespace App\Enums;

enum Channel: string
{
    case Email = 'email';
    case Sms = 'sms';
    case Push = 'push';
    case InApp = 'in_app';

    public static function availableInPhase1(): array 
    {
        return [
            self::Email,
            self::InApp,
        ];
    }

    public function label(): string
    {
        return match ($this) 
        {
            self::Email => 'Email',
            self::Sms => 'SMS',
            self::Push => 'Push',
            self::InApp => 'In-App',
        };
    }
}
