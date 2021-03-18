<?php

use PHPUnit\Framework\TestCase;


final class BankAccount
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
        $bankAccount = new BankAccount(); //can't be mocked because of final + no interface
        $user = new User($bankAccount);
    }
}