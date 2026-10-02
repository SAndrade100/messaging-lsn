<?php

namespace App\Models;

use App\Enums\DeliveryStatus;
use App\Enums\NotificationStatus;
use App\Enums\Priority;
use Database\Factories\NotificationFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notification extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tenant_id',
        'idempotency_key',
        'category',
        'priority',
        'template_key',
        'payload',
        'target_type',
        'scheduled_at',
        'status',
    ];

    protected function casts(): array 
    {
        return [
            'payload' => 'array',
            'priority' => Priority::class,
            'status' => NotificationStatus::class,
            'scheduled_at' => 'datetime',
        ];
    }

    public function tenant(): BelongsTo 
    {
        return $this->belongsTo(Tenant::class);
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function refreshStatus(): void 
    {
        $statuses = $this->deliveries()->pluck('status');

        if ($statuses->isEmpty()) {
            return;
        }

        $allFInal = $statuses->every(
            fn (DeliveryStatus $status) => $status->isFinal()
        );

        $this->update([
            'status' => $allFinal ? NotificationStatus::Completed : NotificationStatus::Processing,
        ]);
    }
}
