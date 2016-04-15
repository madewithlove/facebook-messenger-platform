<?php

namespace Madewithlove\FacebookMessengerPlatform\Api;

use Madewithlove\FacebookMessengerPlatform\Api\Requests\Send;
use InvalidArgumentException;
use BadMethodCallException;

/**
 * @method Requests\Send send()
 */
class Client
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $version = 'v2.6';

    /**
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function api($name)
    {
        switch ($name) {
            case 'send':
                $api = new Send($this);
                break;
            default:
                throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }

    /**
     * @param $name
     * @param $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $exception) {
            throw new BadMethodCallException(sprintf('Undefined method called %s', $name));
        }
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
