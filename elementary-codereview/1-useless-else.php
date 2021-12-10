<?php

class Example
{
    private $bankRepository;
    private $bankCodesService;
    private Bank $bank;
    //...

    public function getBank(?BankId $id, ?SwiftCode $swiftCode): Bank
    {
        if ($id) {
            return $this->bankRepository->findBank($id);
        }

        if ($swiftCode) {
            return $this->bankCodesService->getOrCreateBankFromSWIFT($swiftCode);
        }

        return $this->bank;
    }
}