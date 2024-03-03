<?php

declare(strict_types=1);

namespace App\Action;

use App\Model\User;
use Hyperf\Swagger\Annotation as Swagger;
use Hyperf\Swagger\Request\SwaggerRequest;
use Menumbing\Resource\Annotation\WithResource;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Swagger\HyperfServer('http')]
#[WithResource]
class CreateUserAction
{
    #[Swagger\Post(path: '/v1/users', summary: 'API for create user')]
    #[Swagger\RequestBody(content: new Swagger\JsonContent(properties: [
        new Swagger\Property(property: 'name', rules: 'required')
    ]))]
    public function handle(SwaggerRequest $request)
    {
        return User::create($request->inputs(['name']));
    }
}
