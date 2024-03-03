<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\HelloWorldSaid;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Listener]
class HelloWorldListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            HelloWorldSaid::class,
        ];
    }

    /**
     * @param  HelloWorldSaid  $event
     *
     * @return void
     */
    public function process(object $event): void
    {
        var_dump($event->name);
    }
}
