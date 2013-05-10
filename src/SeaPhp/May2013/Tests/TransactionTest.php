<?php

namespace SeaPhp\May2013\Tests;

use SeaPhp\May2013\Account;
use SeaPhp\May2013\AccountNotifier;
use SeaPhp\May2013\Transaction;

class TransactionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function test__constructInvalidType()
    {
        $transaction = new Transaction(null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test__constructAmount()
    {
        $amount = 'foo';
        $transaction = new Transaction(Transaction::TYPE_WITHDRAWAL, $foo);
    }

    public function testGetType()
    {
        $transaction = new Transaction(Transaction::TYPE_WITHDRAWAL);
        $this->assertEquals(Transaction::TYPE_WITHDRAWAL, $transaction->getType());
    }

    public function testGetAmount()
    {
        $amount = 10;
        $transaction = new Transaction(Transaction::TYPE_WITHDRAWAL, $amount);
        $this->assertEquals($amount, $transaction->getAmount());
    }

    public function testGetTime()
    {
        $time = time();
        $transaction = new Transaction(Transaction::TYPE_WITHDRAWAL, 0, $time);
        $this->assertEquals($time, $transaction->getTime());
    }

    public function testGetBadTime()
    {
        $time = 'foo';
        $transaction = new Transaction(Transaction::TYPE_WITHDRAWAL, 0, $time);
        $this->assertNotEquals($time, $transaction->getTime());
    }
}
