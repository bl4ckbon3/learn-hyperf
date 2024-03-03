<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Service\BalanceDeductorService;
use App\Service\MailSenderService;
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

    #[Inject]
    protected MailSenderService $mailSender;

    #[Inject]
    protected BalanceDeductorService $balanceDeductor;

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

    #[PostMapping(path: '/emails')]
    public function sendEmail()
    {
        $this->mailSender->sendMail($this->request->input('email'), $this->request->input('text'));
        //$this->balanceDeductor->deduct(10);

        return 'Mail sent';
    }
}
