<?php

declare(strict_types=1);

namespace App\Action;

use App\Model\User;
use Hyperf\Swagger\Annotation as Swagger;
use Menumbing\Resource\Annotation\WithResource;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Swagger\HyperfServer('http')]
#[WithResource]
class GetAllUsersAction
{
    #[Swagger\Get(path: '/v1/users')]
    #[Swagger\Response(
        response: 200,
        content: new Swagger\JsonContent(
            properties: [
                new Swagger\Property(property: 'id', type: 'string'),
                new Swagger\Property(property: 'name', type: 'string'),
            ]
        )
    )]
    public function handle()
    {
        return User::all();
    }
}
