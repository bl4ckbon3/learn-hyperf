<?php

declare(strict_types=1);

namespace App\GraphQL\Factory;

use App\Model\Product;
use App\Repository\ProductRepository;
use Hyperf\Di\Annotation\Inject;
use Menumbing\GraphQL\Annotation\Validate;
use TheCodingMachine\GraphQLite\Annotations\Factory;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class ProductFactory
{
    #[Inject]
    protected ProductRepository $productRepository;

    #[Factory(name: 'ProductRefInput', default: true)]
    public function getProductById(#[Validate(rule: 'required|uuid')] string $id): Product
    {
        return $this->productRepository->findById($id);
    }
}
