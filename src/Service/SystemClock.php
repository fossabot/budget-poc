<?php

namespace App\Service;

use DateTime;
use DateTimeImmutable;
use DateTimeZone;
use Exception;

/**
 * Class TimeService
 * @package App\Service
 */
class SystemClock implements ClockInterface
{
    /**
     * @var DateTimeZone
     */
    private $timezone;

    /**
     * SystemClock constructor.
     * @param DateTimeZone|null $timezone
     */
    public function __construct(?DateTimeZone $timezone = null)
    {
        $this->timezone = $timezone ?: new DateTimeZone(date_default_timezone_get());
    }

    /**
     * @return DateTimeImmutable
     * @throws Exception
     */
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timezone);
    }
}
