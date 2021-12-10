<?php

class BankData
{
    public function getSwiftCode()
    {
        //...
    }

    public function getName()
    {
        //...
    }
    //...
}

class Example
{
    private function iNeedBankData()
    {
        $bankData = $this->getBankData();
    }

    private function getBankData($by = null): BankData
    {
        //...
    }
}
