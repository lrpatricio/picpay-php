<?php

namespace PicPay\Endpoints;

use Exception;
use PicPay\Enum\HTTP;

class Status extends Endpoint
{
    /**
     * @return array
     */
    protected function requiredFields()
    {
        return [
            "referenceId"
        ];
    }

    /**
     * @param array $payload
     * @return object|void
     * @throws Exception
     */
    protected function request(array $payload)
    {
        return $this->client->request(HTTP::GET, "payments/{$payload["referenceId"]}/status");
    }
}