<?php

declare(strict_types=1);

namespace App\Task;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class SecondBatchTask
{
    public function execute(): string
    {
        sleep(5);

        var_dump('SECOND BATCH TASK');

        return 'Second Batch';
    }
}
