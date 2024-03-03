<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Product;
use App\Model\User;
use HyperfExtension\Auth\Annotations\Gate;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class ProductPolicy
{
    #[Gate('CREATE_PRODUCT')]
    public function create(User $user): bool
    {
        return $user->name === 'Iqbal Maulana';
    }

    #[Gate('UPDATE_PRODUCT')]
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->userId;
    }
}
