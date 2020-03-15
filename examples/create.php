<?php

require(__DIR__.'/../vendor/autoload.php');
require(__DIR__.'/tokens.php');

$picpay = new PicPay\Client($xPicPayToken);
$picpay->create()->send([
    "referenceId" => "102030",
    "callbackUrl" => "http://www.sualoja.com.br/callback",
    "returnUrl" => "http://www.sualoja.com.br/cliente/pedido/102030",
    "value" => 20.51,
    "expiresAt" => "2022-05-01T16:00:00-03:00",
    "buyer" => [
        "firstName" => "João",
        "lastName" => "Da Silva",
        "document" => "123.456.789-10",
        "email" => "teste@picpay.com",
        "phone" => "+55 27 12345-6789"
    ]
]);