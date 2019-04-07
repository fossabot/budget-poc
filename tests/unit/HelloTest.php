<?php
namespace Test\App;

use App\Hello;

/**
 * Class HelloTest
 */
class HelloTest extends \Codeception\Test\Unit
{
    /**
     *
     */
    public function testToString()
    {
        $this->assertEquals('Hello World', (new Hello())->__toString());
    }
}
