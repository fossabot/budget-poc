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
     * @return ClockInterface
     * @throws Exception
     */
    public function getClock(bool $frozen_clock = false): ClockInterface
    {
        if ($frozen_clock) {
            return new FrozenClock(new DateTimeImmutable('2018-12-01 13:00:00'));
        }
        return new SystemClock();
    }
}
