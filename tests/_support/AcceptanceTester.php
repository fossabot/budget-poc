<?php
namespace Test\Support;

use Behat\Behat\Context\Context;
use Codeception\Actor;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends Actor implements Context
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given I am logged as :email with password :password
     * @param string $email
     * @param string $password
     */
    public function iAmAmLogged(string $email, string $password)
    {
        $this->amOnPage('/login');
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click('Sign in');
    }

    /**
     * @Given I set frozen clock to :clock
     * @param string $clock
     */
    public function iSetFrozenClockTo(string $clock)
    {
        file_put_contents(codecept_root_dir().'/var/clock', $clock);
    }
}
