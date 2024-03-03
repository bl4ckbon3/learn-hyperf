<?php

declare(strict_types=1);

namespace App\Service;

use Hyperf\AsyncQueue\Annotation\AsyncQueueMessage;
use Hyperf\Contract\StdoutLoggerInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsyncQueueMessage(pool: 'balance', delay: 5)]
class BalanceDeductorService
{
    public function __construct(protected StdoutLoggerInterface $logger)
    {
    }

    public function deduct(int $amount): void
    {
        $this->logger->info('Deducting money....');
        sleep(10);

        $this->logger->info('Amount deducted: ' . $amount);
    }
}
