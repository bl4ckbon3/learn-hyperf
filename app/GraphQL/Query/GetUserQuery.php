<?php

declare(strict_types=1);

namespace App\GraphQL\Query;

use App\Model\User;
use TheCodingMachine\GraphQLite\Annotations\Query;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class GetUserQuery
{
    #[Query]
    public function getUser(string $id): User
    {
        return User::find($id);
    }
}
