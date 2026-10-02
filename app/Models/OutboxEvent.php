<?php

namespace App\Models;

use Database\Factories\OutboxEventFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutboxEvent extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'outbox';

    protected $fillable = [
        'aggregate_id',
        'event_type',
        'payload',
        'published_at',
    ];

    protected function casts(): array 
    {
        return [
            'payload' => 'array',
            'published_at' => 'datetime',
        ];
    }

    public const EVENT_NOTIFICATION_CREATED = 'notification.created';
}
