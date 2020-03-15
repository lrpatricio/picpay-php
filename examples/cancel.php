<?php

require(__DIR__.'/../vendor/autoload.php');
require(__DIR__.'/tokens.php');

$picpay = new PicPay\Client($xPicPayToken);
$picpay->cancel()->send([
    "referenceId" => "102030",
    "authorizationId" => "555008cef7f321d00ef236333"
]);