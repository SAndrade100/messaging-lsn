<?php

namespace Database\Factories;

use App\Enums\Channel;
use App\Enums\DeliveryStatus;
use App\Models\Delivery;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'notification_id' => Notification::factory(),
            'recipient_id' => User::factory(),
            'channel' => Channel::Email,
            'status' => DeliveryStatus::Queued,
            'attempts' => 0,
        ];
    }
}
