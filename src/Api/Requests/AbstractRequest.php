<?php

namespace Madewithlove\FacebookMessengerPlatform\Api\Requests;

use Madewithlove\FacebookMessengerPlatform\Api\Client;

abstract class AbstractRequest
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $path
     * @param array $parameters
     * @param array $headers
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($path, array $parameters = [], $headers = [])
    {
        return $this->client->getHttpClient()->request('post', $this->buildPath($path),
            [
                'json' => $parameters,
                'headers' => $headers,
            ]
        );
    }

    /**
     * @param $path
     *
     * @return string
     */
    protected function buildPath($path)
    {
        return sprintf('%s/%s', $this->client->getVersion(), $path);
    }
}
