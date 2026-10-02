<?php

namespace Database\Factories;

use App\Models\OutboxEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OutboxEventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'aggregate_id' => (string) Str::uuid7(),
            'event_type' => OutboxEvent::EVENT_NOTIFICATION_CREATED,
            'payload' => [],
            'published_at' => null,
        ];
    }
}
