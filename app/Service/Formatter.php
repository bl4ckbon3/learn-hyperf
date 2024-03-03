<?php

declare(strict_types=1);

namespace App\Service;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Formatter
{
    public function format(string $text): string
    {
        return 'formatted: ' . $text;
    }
}
