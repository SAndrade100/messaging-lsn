<?php

namespace App\Models;

use App\Enums\Channel;
use App\Enums\DeliveryStatus;
use Database\Factories\DeliveryFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'notification_id',
        'recipient_id',
        'channel',
        'provider',
        'status',
        'attempts',
        'last_error',
        'provider_message_id',
        'sent_at',
        'delivered_at',
    ];

    protected function casts(): array 
    {
        return [
            'channel' => Channel::class,
            'status' => DeliveryStatus::class, 
            'sent_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    public function notification(): BelongsTo 
    {
        return $this->belongsTo(Notification::class);
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
