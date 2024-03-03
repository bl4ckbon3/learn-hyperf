<?php

declare(strict_types=1);

namespace App\Service;

use Hyperf\Cache\Annotation\Cacheable;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class CachedService
{
    protected array $data = [
        1 => 'Iqbal Maulana Oke Banget',
        2 => 'Arif Sutoyo Oke',
    ];

    #[Cacheable(prefix: 'my_service', ttl: 60, listener: 'my-service')]
    public function getData(int $id): string
    {
        return $this->data[$id];
    }
}
