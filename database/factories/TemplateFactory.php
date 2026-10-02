<?php

namespace Database\Factories;

use App\Enums\Channel;
use App\Models\Template;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'key' => 'order.shipped',
            'version' => 1,
            'channel' => Channel::Email,
            'locale' => 'pt-BR',
            'subject' => 'Seu pedido foi enviado!',
            'body' => 'Ola {{ $name }}, seu pedido {{ $order_id }} foi enviado. Codigo de rastreio: {{ $tracking }}.',
            'is_active' => true,
        ];
    }
}
