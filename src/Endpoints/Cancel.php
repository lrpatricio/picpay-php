<?php

namespace PicPay\Endpoints;

use Exception;
use PicPay\Enum\HTTP;

class Cancel extends Endpoint
{
    /**
     * @return array
     */
    protected function requiredFields()
    {
        return [
            "referenceId",
            "authorizationId"
        ];
    }

    /**
     * @param array $payload
     * @return object|void
     * @throws Exception
     */
    protected function request(array $payload)
    {
        return $this->client->request(HTTP::POST, "payments/{$payload["referenceId"]}/cancellations", [
            "authorizationId" => $payload["authorizationId"]
        ]);
    }
}