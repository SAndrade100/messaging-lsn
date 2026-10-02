<?php

namespace Database\Factories;

use App\Enums\Channel;
use App\Models\User;
use App\Models\UserPreference;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPreferenceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category' => 'order_updates',
            'channel' => fake()->randomElement(Channel::availableInPhase1()),
            'enabled' => true,
            'timezone' => 'America/Sao_Paulo',
        ];
    }

    public function disabled(): static
    {
        return $this->state(fn (array $attributes) => [
            'enabled' => false,
        ]);
    }
}
