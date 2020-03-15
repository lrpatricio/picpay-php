<?php

namespace PicPay;

use Exception;
use GuzzleHttp\Exception\ClientException as ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use PicPay\Endpoints\Cancel;
use PicPay\Endpoints\Create;
use PicPay\Endpoints\Status;
use Psr\Http\Message\ResponseInterface;

class Client
{
    const BASE_URL = "https://appws.picpay.com/ecommerce/public/";

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var string
     */
    private $picpayToken;

    /**
     * @var Create
     */
    private $create;

    /**
     * @var Cancel
     */
    private $cancel;

    /**
     * @var Status
     */
    private $status;

    /**
     * Client constructor.
     * @param string $picpayToken
     */
    public function __construct($picpayToken)
    {
        $this->picpayToken = $picpayToken;

        $this->client = new \GuzzleHttp\Client();

        $this->create = new Create($this);
        $this->cancel = new Cancel($this);
        $this->status = new Status($this);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $body
     * @return ResponseInterface
     * @throws ClientException
     * @throws Exception
     */
    public function request($method, $uri, $body = [])
    {
        try
        {
            return $this->client->request(
                $method,
                self::BASE_URL.$uri,
                [
                    RequestOptions::HEADERS => [
                        "x-picpay-token" => $this->picpayToken,
                        "Accept-Encoding" => "application/json",
                        "Content-Type"    => "application/json",
                    ],
                    RequestOptions::JSON => $body
                ]
            );
        }
        catch(ClientException $exception)
        {
            return $exception->getResponse();
        }
        catch(Exception $exception)
        {
            throw $exception;
        }
    }

    /**
     * @return Create
     */
    public function create()
    {
        return $this->create;
    }

    /**
     * @return Cancel
     */
    public function cancel()
    {
        return $this->cancel;
    }

    /**
     * @return Status
     */
    public function status()
    {
        return $this->status;
    }
}