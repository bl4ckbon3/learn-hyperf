<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Database\Model\Concerns\HasUuids;
use Menumbing\Orm\Contract\CacheableInterface;
use Menumbing\Orm\Model;
use Menumbing\Orm\Trait\Cacheable;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class User extends Model implements CacheableInterface
{
    use HasUuids;
    use Cacheable;

    protected array $fillable = [
        'name',
    ];
}
