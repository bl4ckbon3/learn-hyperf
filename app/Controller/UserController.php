<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use HyperfExtension\Auth\Annotations\Auth;
use HyperfExtension\Auth\Contracts\AuthManagerInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Controller]
class UserController extends AbstractController
{
    #[Inject]
    protected AuthManagerInterface $authManager;

    #[PostMapping(path: '/users')]
    public function store(): User
    {
        return User::create($this->request->inputs(['name']));
    }

    #[GetMapping(path: '/users')]
    #[Auth]
    public function index()
    {
        return User::all();
    }

    #[GetMapping(path: '/auth/me')]
    #[Auth]
    public function me()
    {
        return $this->authManager->guard()->user();
    }
}
