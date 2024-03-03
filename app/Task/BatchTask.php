<?php

declare(strict_types=1);

namespace App\Task;

use Hyperf\Task\Annotation\Task;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class BatchTask
{
    #[Task]
    public function execute(): string
    {
        var_dump('EXECUTE TASK');
        sleep(5);
        var_dump('TASK DONE');

        return 'Keren Dah!';
    }
}
