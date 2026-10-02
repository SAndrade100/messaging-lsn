<?php

namespace Database\Factories;

use App\Enums\NotificationStatus;
use App\Enums\Priority;
use App\Models\Notification;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'idempotency_key' => fake()->unique()->uuid(),
            'category' => 'order_updates',
            'priority' => Priority::Normal,
            'template_key' => 'order.shipped',
            'payload' => [
                'order_id' => (string) fake()->randomNumber(5),
                'tracking' => strtoupper(fake()->bothify('BR######')),
            ],
            'target_type' => 'user',
            'status' => NotificationStatus::Pending,
        ];
    }
}
