<?php

namespace SeaPhp\May2013\Tests;

use SeaPhp\May2013\Account;
use SeaPhp\May2013\AccountNotifier;
use SeaPhp\May2013\Transaction;

class AccountTest extends \PHPUnit_Framework_TestCase
{
    protected $test_id = 'ABC456AD';

    /**
     * @expectedException InvalidArgumentException
     */
    public function test__constructId()
    {
        $account = new Account(null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test__constructBalance()
    {
        $balance = 'foo';
        $account = new Account($this->test_id, $balance);
    }
    
    public function testGetId()
    {
        $account = new Account($this->test_id);
        $this->assertEquals($account->getId(), $this->test_id);
    }

    public function testGetBalance()
    {
        $balance = 150;
        $account = new Account($this->test_id, $balance);
        $this->assertEquals($account->getBalance(), $balance);
    }

    public function testDeposit()
    {
        $balance = 1;
        $deposit = 50;
        $account = new Account($this->test_id, $balance);
        $account->deposit($deposit);
        $this->assertEquals($deposit+$balance, $account->getBalance());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidDeposit()
    {
        $account = new Account($this->test_id);
        $account->deposit('foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testAttach()
    {
        echo 1 ;die;
        $foo = 1;
        $account = new Account($this->test_id);
        $account->attach($foo);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testDetach()
    {
        $foo = 1;
        $account = new Account($this->test_id);
        $account->attach($foo);
    }
}
