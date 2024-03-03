<?php

declare(strict_types=1);

namespace App\GraphQL\Input;

use Menumbing\GraphQL\Annotation\Validate;
use TheCodingMachine\GraphQLite\Annotations\Field;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
abstract class ProductInput
{
    #[Field]
    #[Validate(rule: 'sometimes|required')]
    public string $name;

    #[Field]
    #[Validate(rule: 'sometimes|gt:0', messages: ['gt' => 'Qty tidak boleh 0'])]
    public int $qty;

    #[Field]
    #[Validate(rule: 'sometimes|gt:0', messages: ['gt' => 'Price tidak boleh 0'])]
    public int $price;

    #[Field]
    #[Validate(rule: 'sometimes|required')]
    public string $description;
}
