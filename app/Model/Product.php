<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Database\Model\Concerns\HasUuids;
use Menumbing\Orm\Model;
use Menumbing\Orm\Relation\BelongsTo;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Product extends Model
{
    use HasUuids;

    protected array $fillable = [
        'name',
        'qty',
        'price',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
