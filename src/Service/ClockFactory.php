<?php

namespace App\Service;

use DateTimeImmutable;
use Exception;

/**
 * Class ClockFactory
 * @package App\Service
 */
class ClockFactory
{
    /**
     * @param bool $frozen_clock
     * @param string $frozen_clock_file
     * @return ClockInterface
     * @throws Exception
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function getClock(bool $frozen_clock = false, string $frozen_clock_file =''): ClockInterface
    {
        if ($frozen_clock) {
            return new FrozenClock(
                is_readable($frozen_clock_file) ?
                    new DateTimeImmutable(file_get_contents($frozen_clock_file)) :
                    new DateTimeImmutable('now')
            );
        }
        return new SystemClock();
    }
}
