<?php

namespace EnotPay;

use GuzzleHttp\Client;

class EnotPayApi
{
    protected $apiKey;

    protected $client;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new Client(['base_uri' => 'https://enot.io/']);
    }

    public function payoff(array $params): string
    {
        $response = $this->client->request(
            'GET',
            sprintf(
                'request/payoff?api_key=%s&email=%s&service=%s&wallet=%s&amount=%s',
                $this->apiKey,
                $params['email'],
                $params['service'],
                $params['wallet'],
                $params['amount']
            )
        );

        return $response->getBody()->getContents();
    }

    public function balance(array $params): string
    {
        $response = $this->client->request(
            'GET',
            sprintf(
                'request/balance?api_key=%s&email=%s',
                $this->apiKey,
                $params['email']
            )
        );

        return $response->getBody()->getContents();
    }
}
