<?php
/**
 * User: jeckel
 * Date: 14/04/19
 * Time: 16:54
 */
namespace Test\App\Service;

use App\Service\SystemClock;
use Codeception\Test\Unit;
use DateTimeImmutable;

class SystemClockTest extends Unit
{
    public function testNow()
    {
        $now = new DateTimeImmutable('now');
        $service = new SystemClock();
        $systemClock = $service->now();
        $this->assertGreaterThanOrEqual($now, $systemClock);
        $this->assertLessThanOrEqual(new DateTimeImmutable('now'), $systemClock);
    }
}
