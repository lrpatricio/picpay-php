# PicPay SDK para PHP

## Getting Started

**Configuração mínima -** Para utilizar o SDK, você vai precisa ter o PHP >= 5.6.

**Instalando o SDK -** Para instalar o SDK de preferência ao composer.
```
composer require lrpatricio/picpay-php
```

## Exemplos

### Configuração
```php
<?php
require('vendor/autoload.php');

$picpay = new PicPay\Client('x-picpay-token');
```

### Criar pagamento

Campos obrigatórios: referenceId, callbackUrl, value, buyer ... no objeto buyer todos os campos são obrigatórios.

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

### Cancelar pagamento

Campos obrigatórios: referenceId, authorizationId.

```php
<?php
$picpay->cancel()->send([
    "referenceId" => "102030",
    "authorizationId" => "555008cef7f321d00ef236333"
]);
```

### Status pagamento

Campo obrigatório: referenceId.

```php
<?php
$picpay->status()->send([
    "referenceId" => "102030",
]);
```


## Outros idiomas
[English](README.en.md)

## Referencia da API
Documentação oficial no [PicPay](https://ecommerce.picpay.com/doc/)

