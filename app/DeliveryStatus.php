<?php

namespace App\Enums;

enum DeliveryStatus: string
{
    case Queued = 'queued';
    case Sent = 'sent';
    case Delivered = 'delivered';
    case Failed = 'failed';
    case Bounced = 'bounced';

    public function isFinal(): bool 
    {
        return match ($this) {
            self::Delivered, self::Failed, self::Bounced => true, 
            self::Queued, self::Sent => false,
        };
    }
}
