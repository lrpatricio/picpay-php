# PicPay SDK for PHP

## Getting Started
**Minimum requirements -** To run the SDK, your system will need to meet the minimum requirements, including having PHP >= 5.6.

**Installing the SDK -** To install the SDK prefer the composer
```
composer require lrpatricio/picpay-php
```

## Quick examples

### Configure
```php
<?php
require('vendor/autoload.php');

$picpay = new PicPay\Client('x-picpay-token');
```

### Create payment

Required fields: referenceId, callbackUrl, value, buyer ... in buyer object all fields are required.

```php
<?php
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
```

### Cancel payment

Required fields: referenceId, authorizationId.

```php
<?php
$picpay->cancel()->send([
    "referenceId" => "102030",
    "authorizationId" => "555008cef7f321d00ef236333"
]);
```

### Status payment

Required field: referenceId.

```php
<?php
$picpay->status()->send([
    "referenceId" => "102030",
]);
```


## Other Languages
[Portuguese](README.md)

## API Reference
Official Documentation on [PicPay](https://ecommerce.picpay.com/doc/)

