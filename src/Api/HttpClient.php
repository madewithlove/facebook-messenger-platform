<?php

namespace Madewithlove\FacebookMessengerPlatform\Api;

use GuzzleHttp\Client;
use Madewithlove\FacebookMessengerPlatform\Api\Contracts\HttpClient as HttpClientInterface;

class HttpClient extends Client implements HttpClientInterface
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $baseUri = 'https://graph.facebook.com';

    /**
     * @var string
     */
    protected $version;

    /**
     * @param array $accessToken
     * @param string $version
     * @param array $config
     */
    public function __construct($accessToken, $version = 'v2.6', array $config = [])
    {
        $this->accessToken = $accessToken;
        $this->version = $version;

        $config = array_merge([
            'base_uri' => $this->baseUri,
            'query' => [
                'access_token' => $this->accessToken,
            ],
        ], $config);

        parent::__construct($config);
    }
}
