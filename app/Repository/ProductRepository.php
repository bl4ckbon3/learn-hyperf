<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Product;
use Menumbing\Orm\Annotation\AsRepository;
use Menumbing\Orm\Repository;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsRepository(modelClass: Product::class)]
class ProductRepository extends Repository
{
}
