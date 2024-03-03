<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\AsyncQueue\Driver\Amqp\AmqpDriverAdapter;
use Hyperf\AsyncQueue\Driver\RedisDriver;

return [
    'pools' => [
        'default' => [
            'driver' => AmqpDriverAdapter::class,
            'auto_register_process' => true,
            'amqp' => [
                'pool' => 'default',
            ],
            'channel' => 'default',
            'timeout' => 2,
            'retry_seconds' => 5,
            'handle_timeout' => 10,
            'processes' => 2,
            'concurrent' => [
                'limit' => 50,
            ],
            'max_messages' => 0,
        ],

        'balance' => [
            'driver' => RedisDriver::class,
            'auto_register_process' => true,
            'redis' => [
                'pool' => 'default',
            ],
            'channel' => 'balance',
            'timeout' => 2,
            'retry_seconds' => 5,
            'handle_timeout' => 10,
            'processes' => 1,
            'concurrent' => [
                'limit' => 1,
            ],
            'max_messages' => 0,
        ],
    ],

    'failed' => [
        'recorder' => Hyperf\AsyncQueue\Failed\DatabaseFailedQueueRecorder::class,
        'options' => [
            'failed_table' => 'failed_messages',
        ],
    ],

    'debug' => [
        'before' => true,
        'after' => true,
        'failed' => true,
        'retry' => true,
    ]
];
