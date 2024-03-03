<?php

declare(strict_types=1);

namespace App\Aspect;

use Hyperf\Di\Annotation\Aspect;
use Menumbing\Tracer\Aspect\MethodAspect;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Aspect]
class TraceMethod extends MethodAspect
{
    public array $classes = [
        'App*',
    ];
}
