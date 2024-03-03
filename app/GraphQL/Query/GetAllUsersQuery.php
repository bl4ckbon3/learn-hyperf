<?php

declare(strict_types=1);

namespace App\GraphQL\Query;

use App\Model\User;
use Hyperf\Collection\Collection;
use TheCodingMachine\GraphQLite\Annotations\Query;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class GetAllUsersQuery
{
    /**
     * @return Collection<User>
     */
    #[Query]
    public function getUsers(): Collection
    {
        return User::all();
    }
}
