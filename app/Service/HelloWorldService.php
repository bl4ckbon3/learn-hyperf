<?php

declare(strict_types=1);

namespace App\Service;

use App\Event\HelloWorldSaid;
use Hyperf\Config\Annotation\Value;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class HelloWorldService
{
    #[Value('service.hello_world')]
    protected string $name;

    #[Inject]
    protected EventDispatcherInterface $event;

    #[Inject]
    protected Formatter $formatter;

    public function hello(): string
    {
        $this->event->dispatch(new HelloWorldSaid($this->name));

        return $this->formatter->format('Hello world ' . $this->name);
    }
}
