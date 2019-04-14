<?php
namespace App\Service;

use DateTimeInterface;

/**
 * Class TimeServiceInterface
 * @package App\Service
 */
interface TimeServiceInterface
{
    /**
     * @return DateTimeInterface
     */
    public function getCurrentDateTime(): DateTimeInterface;
}
