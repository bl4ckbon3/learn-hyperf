<?php

declare(strict_types=1);

namespace App\Service;

use Hyperf\AsyncQueue\Annotation\AsyncQueueMessage;
use Hyperf\Contract\StdoutLoggerInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsyncQueueMessage(pool: 'default', delay: 15, maxAttempts: 2)]
class MailSenderService
{
    public function __construct(protected StdoutLoggerInterface $logger)
    {
    }

    public function sendMail(string $email, string $text): void
    {
        $this->logger->info('Sending email...');
        sleep(1);
        $this->logger->info('Mail sent to ' . $email . ' with text: ' . $text);

        //throw new \Exception('Cannot connect to mail server...');
    }
}
