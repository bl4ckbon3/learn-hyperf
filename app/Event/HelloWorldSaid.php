<?php

declare(strict_types=1);

namespace App\Event;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class HelloWorldSaid
{
    public function __construct(public readonly string $name)
    {
    }
}
