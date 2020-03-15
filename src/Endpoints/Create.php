<?php

namespace PicPay\Endpoints;

use Exception;
use PicPay\Enum\HTTP;

class Create extends Endpoint
{
    /**
     * @return array
     */
    protected function requiredFields()
    {
        return [
            "referenceId",
            "callbackUrl",
            "value",
            "buyer",
            "buyer.firstName",
            "buyer.lastName",
            "buyer.document",
            "buyer.email",
            "buyer.phone"
        ];
    }

    /**
     * @param array $payload
     * @return object|void
     * @throws Exception
     */
    protected function request(array $payload)
    {
        return $this->client->request(HTTP::POST, "payments", $payload);
    }
}