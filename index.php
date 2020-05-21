<?php

require 'vendor/autoload.php';

use EnotPay\EnotPay;

$enotPay = new EnotPay(2715, 'KxFaIpMOKR6Cde7IMYJoGyQaL_Vsz_LR');

$enotApi = new \EnotPay\EnotPayApi('ceba4e5b5d41ff3664789ca10dc1f3ab');

$form = $enotPay
    ->form()
    ->setPaymentId(time())
    ->setOrderAmount(35)
;

$route = $_GET['route'] ?? 'main';

//https://devstart.ru/?route=webhook
//https://devstart.ru/?route=success
//https://devstart.ru/?route=fail

if ($route === 'webhook') {

    $params = $_POST;

} elseif ($route === 'success') {

    echo 'Платеж прошел успешно.';

} elseif ($route === 'fail') {

    echo 'Платеж не прошел.';

} else {
    echo $form->make();
}

$balance = $enotApi->balance(['email' => 'devstart.ru@gmail.com']);

print_r($balance);
