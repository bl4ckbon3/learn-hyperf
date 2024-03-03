<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Controller]
class UserController extends AbstractController
{
    #[PostMapping(path: '/users')]
    public function store(): User
    {
        return User::create($this->request->inputs(['name']));
    }

    #[GetMapping(path: '/users')]
    public function index()
    {
        return User::all();
    }
}
