<?php

class Example
{
    private $bankRepository;
    private $bankCodesService;
    private Bank $bank;
    //...

    /**
     * @param  mixed  $by
     * @return mixed
     */
    public function getBank($by)
    {
        if (is_object($by) && $by instanceof BankId) {
            return $this->bankRepository->findBank($by);
        }
        if (is_object($by) && $by instanceof SwiftCode) {
            return $this->bankCodesService->getOrCreateBankFromSWIFT($by);
        }

        return $this->bank;
    }
}