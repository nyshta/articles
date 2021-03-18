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
            $bank = $this->bankRepository->findBank($id);
        } elseif ($swiftCode) {
            $bank = $this->bankCodesService->getOrCreateBankFromSWIFT($swiftCode);
        } else {
            $bank = $this->bank;
        }

        return $bank;
    }
}