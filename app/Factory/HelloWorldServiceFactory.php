<?php

declare(strict_types=1);

namespace App\Factory;

use App\Service\HelloWorldService;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class HelloWorldServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new HelloWorldService(
            'Iqbal Putra',
            $container->get(EventDispatcherInterface::class)
        );
    }
}
