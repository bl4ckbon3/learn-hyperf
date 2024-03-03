<?php

declare(strict_types=1);

namespace App\GraphQL\Type;

use App\Model\Product;
use App\Model\User;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Type(class: Product::class)]
class ProductType
{
    #[Field]
    public function getId(Product $product): string
    {
        return $product->id;
    }

    #[Field]
    public function getName(Product $product): string
    {
        return $product->name;
    }

    #[Field]
    public function getQty(Product $product): int
    {
        return $product->qty;
    }

    #[Field]
    public function getPrice(Product $product): int
    {
        return $product->price;
    }

    #[Field]
    public function getDescription(Product $product): string
    {
        return $product->description;
    }

    #[Field]
    public function getUser(Product $product): User
    {
        return $product->user;
    }
}
