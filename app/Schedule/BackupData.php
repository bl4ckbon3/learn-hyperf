<?php

declare(strict_types=1);

namespace App\Schedule;

use Hyperf\Crontab\Annotation\Crontab;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Crontab(rule: '* * * * *', callback: 'execute')]
class BackupData
{
    public function execute(): void
    {
        var_dump('BACKUP DATA....');
    }
}
