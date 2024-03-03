<?php

declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Input\UpdateProductInput;
use App\Model\Product;
use App\Repository\ProductRepository;
use Hyperf\Di\Annotation\Inject;
use Menumbing\GraphQL\Utils\InputFieldsExtractor;
use TheCodingMachine\GraphQLite\Annotations\Logged;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Security;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class UpdateProductMutation
{
    #[Inject]
    protected ProductRepository $productRepository;

    #[Mutation]
    #[Logged]
    #[Security("is_granted('UPDATE_PRODUCT', product)")]
    public function updateProduct(Product $product, UpdateProductInput $input): Product
    {
        $product->fill(InputFieldsExtractor::extractValues($input));

        return $this->productRepository->save($product);
    }
}
