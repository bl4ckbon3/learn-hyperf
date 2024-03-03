<?php

declare(strict_types=1);

namespace App\Process;

use Hyperf\Process\AbstractProcess;
use Hyperf\Process\Annotation\Process;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
//#[Process(nums: 1, name: 'check_claim')]
class CheckClaim extends AbstractProcess
{
    protected EventDispatcherInterface $dispatcher;
    public function handle(): void
    {
        var_dump('START PROCESS CHECK CLAIM');

        $count = 0;
        while (true) {
            if ($count++ > 10) {
                break;
            }

            var_dump('CHECK CLAIM');

            sleep(1);
        }

        var_dump('STOP PROCESS CHECK CLAIM');
    }
}
