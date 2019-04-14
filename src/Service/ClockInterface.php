<?php
namespace App\Service;

use DateTimeImmutable;

/**
 * Class TimeServiceInterface
 * @package App\Service
 */
interface ClockInterface
{
    /**
     * @return DateTimeImmutable
     */
    public function now(): DateTimeImmutable;
}
