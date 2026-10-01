<?php 

return [
    'amqp' => [
        'host' => env('RABBITMQ_HOST', 'localhost'),
        'port' => env('RABBITMQ_PORT', '5672'),
        'user' => env('RABBITMQ_USER', 'guest'),
        'password' => env('RABBITMQ_PASSWORD', 'guest'),
        'vhost' => env('RABBITMQ_VHOST', '/'),

        'exchange' => env('RABBITMQ_EXCHANGE', 'notifications.dispatch'),

        'queue' => env('RABBITMQ_QUEUE', 'notifications.process'),
        'routing_key' => env('RABBITMQ_ROUTING_KEY', 'notification.created'),

        'prefetch_count' => (int) env('RABBITMQ_PREFETCH_COUNT', 10),
    ],

    'outbox' => [
        'poll_interval_ms' => (int) env('OUTBOX_RELAY_POLL_MS', 200),
        'batch_size' => (int) env('OUTBOX_RELAY_BATCH_SIZE', 50),
    ],

    'dedup' => [
        'ttl_seconds' => (int) env('DEDUP_TTL_SECONDS', 86400),
    ],

    // OBSERVAÇÃO: ESSE RATE LIMIT ESTÁ BAIXO A FIM DE GERAR ERROS 429 EM AMBIENTE DE TESTES
    'rate_limit' => [
        'request_per_minute' => (int) env('API_RATE_LIMIT_PER_MINUTE', 120),
    ]
];