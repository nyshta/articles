<?php

use PHPUnit\Framework\TestCase;


final class BankAccount implements BankAccountInterface
{
    //...
}

class User
{
    public function __construct(BankAccount $bankAccount)
    {
        //...
    }
}


class UserTest extends TestCase
{
    public function testBla()
    {
        $bankAccount = self::createMock(BankAccountInterface::class);
        $user = new User($bankAccount);
    }
}