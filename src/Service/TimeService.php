<?php

namespace App\Service;

use DateTimeInterface;
use DateTime;
use Exception;

/**
 * Class TimeService
 * @package App\Service
 */
class TimeService implements TimeServiceInterface
{
    /**
     * @return DateTimeInterface
     * @throws Exception
     */
    public function getCurrentDateTime(): DateTimeInterface
    {
        return new DateTime();
    }
}
