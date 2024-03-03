<?php

declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Input\CreateProductInput;
use App\Model\Product;
use App\Model\User;
use App\Repository\ProductRepository;
use Hyperf\Di\Annotation\Inject;
use HyperfExtension\Auth\Contracts\AuthManagerInterface;
use Menumbing\GraphQL\Utils\InputFieldsExtractor;
use TheCodingMachine\GraphQLite\Annotations\Logged;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Security;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class CreateProductMutation
{
    #[Inject]
    protected ProductRepository $productRepository;

    #[Inject]
    protected AuthManagerInterface $authManager;

    #[Mutation]
    #[Logged]
    #[Security("is_granted('CREATE_PRODUCT')")]
    public function createProduct(CreateProductInput $input): Product
    {
        $product = new Product(InputFieldsExtractor::extractValues($input));
        $product->user()->associate($this->authManager->guard()->user());

        return $this->productRepository->save($product);
    }
}
