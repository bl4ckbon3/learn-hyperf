<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Service\CachedService;
use App\Service\HelloWorldService;
use App\Task\BatchTask;
use App\Task\SecondBatchTask;
use DateTime;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller]
class IndexController extends AbstractController
{
    #[Inject]
    protected HelloWorldService $hello;

    #[Inject]
    protected CachedService $service;

    #[GetMapping(path: '/')]
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method'  => $method,
            'message' => "Hello {$user}.",
        ];
    }

    #[GetMapping(path: '/ping')]
    public function ping()
    {
        $start = new DateTime();

        $result = [
            $this->container->get(BatchTask::class)->execute(),
            $this->container->get(SecondBatchTask::class)->execute(),
        ];

        return [
            'pong'       => $this->hello->hello(),
            'result'     => $result,
            'execute_in' => (new DateTime())->diff($start)->s . ' seconds',
        ];
    }

    #[GetMapping(path: '/data/{id}')]
    public function demoCache(string $id)
    {
        return $this->service->getData((int)$id);
    }
}
