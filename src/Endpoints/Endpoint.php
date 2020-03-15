<?php

namespace PicPay\Endpoints;

use Exception;
use PicPay\Client;
use PicPay\Helpers\PayloadHelper;
use PicPay\PayloadException;
use Psr\Http\Message\ResponseInterface;

abstract class Endpoint
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Endpoint constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $payload
     * @return array
     * @throws Exception
     */
    public function send(array $payload)
    {
        $this->validPayload($payload);
        return $this->response($this->request($payload));
    }

    /**
     * @param array $payload
     * @return void
     * @throws PayloadException
     * @throws Exception
     */
    private function validPayload(array $payload)
    {
        $requiredFields = $this->requiredFields();

        foreach($requiredFields as $field)
        {
            if(!PayloadHelper::get($payload, $field))
            {
                throw PayloadException::requiredField($field);
            }
        }
    }

    /**
     * @return array
     * @throws Exception
     */
    protected abstract function requiredFields();

    /**
     * @param array $payload
     * @return ResponseInterface
     */
    protected abstract function request(array $payload);

    /**
     * @param ResponseInterface $response
     * @return array
     */
    protected function response(ResponseInterface $response)
    {
        return [
            "http" => [
                "status" => $response->getStatusCode(),
                "protocolVersion" => $response->getProtocolVersion()
            ],
            "headers" => $response->getHeaders(),
            "body" => \GuzzleHttp\json_decode($response->getBody()->__toString(), true)
        ];
    }
}