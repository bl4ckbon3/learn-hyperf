<?php

declare(strict_types=1);

namespace App\GraphQL\Type;

use App\Model\User;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Type(class: User::class)]
class UserType
{
    #[Field]
    public function getId(User $user): string
    {
        return $user->id;
    }

    #[Field]
    public function getName(User $user): string
    {
        return strtoupper($user->name);
    }
}
