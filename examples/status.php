<?php

require(__DIR__.'/../vendor/autoload.php');
require(__DIR__.'/tokens.php');

$picpay = new PicPay\Client($xPicPayToken);
$picpay->cancel()->send([
    "referenceId" => "102030"
]);