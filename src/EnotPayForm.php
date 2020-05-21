<?php

namespace EnotPay;


class EnotPayForm
{
    protected $merchantId;
    protected $secretWord;
    protected $orderAmount;
    protected $paymentId;

    public function __construct(int $merchantId, string $secretWord)
    {
        $this->merchantId = $merchantId;
        $this->secretWord = $secretWord;
    }

    public function setOrderAmount(float $orderAmount): EnotPayForm
    {
        $this->orderAmount = $orderAmount;

        return $this;
    }

    public function setPaymentId(int $paymentId): EnotPayForm
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    public function make(): string
    {
        $merchantId = $this->merchantId;
        $secretWord = $this->secretWord;
        $orderAmount = $this->orderAmount;
        $paymentId = $this->paymentId;

        $sign = md5($merchantId.':'.$orderAmount.':'.$secretWord.':'.$paymentId);

        return "<form method='get' action='https://enot.io/_/pay'>
         <input type='hidden' name='m' value='$merchantId'>
         <input type='hidden' name='oa' value='$orderAmount'>
         <input type='hidden' name='o' value='$paymentId'>
         <input type='hidden' name='s' value='$sign'>
         <input type='submit' value='Оплатить'>
         </form>";
    }

}
