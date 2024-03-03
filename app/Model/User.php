<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Database\Model\Concerns\HasUuids;
use HyperfExtension\Auth\Authenticatable;
use HyperfExtension\Auth\Contracts\AuthenticatableInterface;
use Menumbing\Orm\Contract\CacheableInterface;
use Menumbing\Orm\Model;
use Menumbing\Orm\Trait\Cacheable;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class User extends Model implements CacheableInterface, AuthenticatableInterface
{
    use HasUuids;
    use Cacheable;
    use Authenticatable;

    protected array $fillable = [
        'name',
    ];
}
