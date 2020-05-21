<?php

namespace EnotPay;

class EnotPay
{
    protected $merchantId;
    protected $secretWord;

    public function __construct(int $merchantId, string $secretWord)
    {
        $this->merchantId = $merchantId;
        $this->secretWord = $secretWord;
    }

    public function form(): EnotPayForm
    {
        return new EnotPayForm($this->merchantId, $this->secretWord);
    }
}
